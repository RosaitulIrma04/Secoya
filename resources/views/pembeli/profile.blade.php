<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil Akun</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success" style="margin: 20px auto; max-width: 480px;">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger" style="margin: 20px auto; max-width: 480px;">
            <ul style="margin-bottom:0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="profile-container">
        <h2 class="profile-title">Profil Akun</h2>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
            </div>
            <div class="form-group">
                <label>Password <small>(Kosongkan jika tidak ingin mengubah)</small></label>
                <input type="password" name="password" class="form-control" placeholder="Password baru">
            </div>
            <div class="form-group">
                <label>No. HP</label>
                <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone ?? '' }}">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="address" class="form-control" rows="2">{{ Auth::user()->address ?? '' }}</textarea>
            </div>
            <div class="form-group">
                <label>Tanggal Bergabung</label>
                <input type="text" class="form-control" value="{{ Auth::user()->created_at->format('d-m-Y') }}" readonly>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="gender" class="form-control">
                    <option value="">Pilih</option>
                    <option value="Laki-laki" {{ Auth::user()->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ Auth::user()->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div style="display: flex; gap: 10px; margin-top: 20px;">
                <a href="{{ route('pembeli.index') }}" class="btn btn-primary">
                    &larr; Kembali
                </a>
                <button type="reset" class="btn btn-secondary" style="min-width:90px;">
                    Reset
                </button>
                <button type="submit" class="btn btn-success" style="min-width:90px;">
                    Update
                </button>
            </div>
        </form>
    </div>
</body>
</html>
