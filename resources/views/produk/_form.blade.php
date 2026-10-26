@php
  $produk = $produk ?? null;
  $galeri = $galeri ?? collect();
  $metode = $method ?? 'POST';
@endphp

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
  @csrf
  @if ($metode !== 'POST')
    @method($metode)
  @endif

  <div class="card-body">
    <div class="row">
      <div class="col-md-8">
        <div class="form-group">
          <label>Judul Produk <span class="text-danger">*</span></label>
          <input type="text" name="judul" value="{{ old('judul', $produk->judul ?? '') }}" placeholder="Nama produk" class="form-control @error('judul') is-invalid @enderror">
          @error('judul')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label>Kategori</label>
          <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror">
            <option value="">Tanpa kategori</option>
            @foreach ($kategoris as $kategori)
              <option value="{{ $kategori->id }}" {{ (string) old('id_kategori', $produk->id_kategori ?? '') === (string) $kategori->id ? 'selected' : '' }}>
                {{ $kategori->name }}
              </option>
            @endforeach
          </select>
          @error('id_kategori')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
    </div>

    <div class="form-group">
      <label>Deskripsi <span class="text-danger">*</span></label>
      <textarea name="deskripsi" class="textarea form-control @error('deskripsi') is-invalid @enderror" rows="5" placeholder="Tuliskan deskripsi produk">{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea>
      @error('deskripsi')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label>Tipe <span class="text-danger">*</span></label>
          <select name="tipe" class="form-control @error('tipe') is-invalid @enderror">
            <option value="gratis" {{ old('tipe', $produk->tipe ?? 'premium') === 'gratis' ? 'selected' : '' }}>Gratis</option>
            <option value="premium" {{ old('tipe', $produk->tipe ?? 'premium') === 'premium' ? 'selected' : '' }}>Premium</option>
          </select>
          @error('tipe')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Harga (Rp)</label>
          <input type="number" name="harga" value="{{ old('harga', $produk->harga ?? '') }}" min="0" class="form-control @error('harga') is-invalid @enderror">
          <small class="text-muted">Wajib untuk produk premium.</small>
          @error('harga')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control @error('status') is-invalid @enderror">
            <option value="Y" {{ old('status', $produk->status ?? 'Y') === 'Y' ? 'selected' : '' }}>Aktif</option>
            <option value="T" {{ old('status', $produk->status ?? 'Y') === 'T' ? 'selected' : '' }}>Tidak Aktif</option>
          </select>
          @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      @if ($developers->isNotEmpty())
        <div class="col-md-3">
          <div class="form-group">
            <label>Developer</label>
            <select name="id_user" class="form-control @error('id_user') is-invalid @enderror">
              @foreach ($developers as $developer)
                <option value="{{ $developer->id }}" {{ (string) old('id_user', $produk->id_user ?? auth()->id()) === (string) $developer->id ? 'selected' : '' }}>
                  {{ $developer->name }}
                </option>
              @endforeach
            </select>
            @error('id_user')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
      @endif
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Link GitHub</label>
          <input type="url" name="link_github" value="{{ old('link_github', $produk->link_github ?? '') }}" placeholder="https://github.com/..." class="form-control @error('link_github') is-invalid @enderror">
          <small class="text-muted">Wajib untuk produk gratis.</small>
          @error('link_github')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Link Google Drive</label>
          <input type="url" name="link_drive" value="{{ old('link_drive', $produk->link_drive ?? '') }}" placeholder="https://drive.google.com/..." class="form-control @error('link_drive') is-invalid @enderror">
          <small class="text-muted">Wajib untuk produk premium.</small>
          @error('link_drive')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Thumbnail</label>
          <input type="file" name="thumbnail" accept="image/*" class="form-control @error('thumbnail') is-invalid @enderror">
          <small class="text-muted">Maksimal 2 MB.</small>
          @error('thumbnail')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          @if ($produk && $produk->thumbnail)
            <div class="mt-2">
              <img src="{{ asset('uploads/produk/thumbnail/'.$produk->thumbnail) }}" alt="{{ $produk->judul }}" class="img-thumbnail" style="max-height: 100px;">
            </div>
          @endif
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Tambah Galeri</label>
          <input type="file" name="gambar[]" multiple accept="image/*" class="form-control @error('gambar.*') is-invalid @enderror">
          <small class="text-muted">Bisa pilih beberapa gambar. Maksimal 2 MB per file.</small>
          @error('gambar.*')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
    </div>

    @if ($galeri->count())
      <div class="form-group">
        <label>Galeri Produk</label>
        <div id="galeri-sortable" class="row">
          @foreach ($galeri as $gambar)
            <div class="col-3 col-md-2 mb-2" data-id="{{ $gambar->id }}" id="gambar-{{ $gambar->id }}">
              <div class="position-relative border rounded overflow-hidden" style="height: 90px; cursor: move;">
                <img src="{{ asset('uploads/produk/galeri/'.$gambar->path) }}" class="w-100 h-100" style="object-fit: cover;" alt="Galeri produk">
                <button type="button" class="galeri-hapus position-absolute" style="top: 0; right: 0; background: none; border: none; color: #dc3545; padding: 2px 5px;" data-id="{{ $gambar->id }}">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          @endforeach
        </div>
        <small class="text-muted">Drag gambar untuk mengubah urutan.</small>
      </div>
    @endif
  </div>

  <div class="card-footer">
    <button type="submit" class="btn btn-success">
      <i class="fas fa-save"></i> Simpan
    </button>
    <a href="{{ route('produk.index') }}" class="btn btn-default float-right">
      <i class="fas fa-undo-alt"></i> Kembali
    </a>
  </div>
</form>

@push('scripts')
  @if ($galeri->count())
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
      $(function () {
        var galeri = document.getElementById('galeri-sortable');

        if (galeri) {
          new Sortable(galeri, {
            animation: 150,
            filter: '.galeri-hapus',
            preventOnFilter: false,
            onEnd: function () {
              var urutan = [];
              $('#galeri-sortable > div').each(function () {
                urutan.push($(this).data('id'));
              });

              $.ajax({
                url: "{{ route('produk.gambar.urutan') }}",
                type: 'POST',
                data: { _token: "{{ csrf_token() }}", urutan: urutan }
              });
            }
          });
        }

        $(document).on('click', '.galeri-hapus', function (event) {
          event.stopPropagation();

          var id = $(this).data('id');
          var tombol = $(this);

          $.ajax({
            url: "{{ url('admin/produk/gambar') }}/" + id,
            type: 'DELETE',
            data: { _token: "{{ csrf_token() }}" },
            success: function (response) {
              if (response.status === 'success') {
                $('#gambar-' + id).fadeOut(200, function () {
                  $(this).remove();
                });
              }
            },
            error: function () {
              toastr.error('Gambar gagal dihapus.', 'Gagal');
            }
          });
        });
      });
    </script>
  @endif
@endpush

