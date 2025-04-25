<div class="mb-3">
    <label>Kode Anggota</label>
    <input type="text" name="member_id" class="form-control" value="{{ old('member_id', $visitor->member_id ?? '') }}">
</div>
<div class="mb-3">
    <label>Nama Lengkap</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $visitor->name ?? '') }}">
</div>
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $visitor->email ?? '') }}">
</div>
<div class="mb-3">
    <label>No. Telepon</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $visitor->phone ?? '') }}">
</div>
<div class="mb-3">
    <label>Alamat</label>
    <textarea name="address" class="form-control">{{ old('address', $visitor->address ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label>Jenis Kelamin</label>
    <select name="gender" class="form-control">
        <option value="M" @selected(old('gender', $visitor->gender ?? '') == 'M')>Laki-laki</option>
        <option value="F" @selected(old('gender', $visitor->gender ?? '') == 'F')>Perempuan</option>
    </select>
</div>
<div class="mb-3">
    <label>Tanggal Daftar</label>
    <input type="date" name="registration_date" class="form-control" value="{{ old('registration_date', $visitor->registration_date ?? '') }}">
</div>
<div class="mb-3">
    <label>Tanggal Kadaluarsa</label>
    <input type="date" name="expiration_date" class="form-control" value="{{ old('expiration_date', $visitor->expiration_date ?? '') }}">
</div>
<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="aktif" @selected(old('status', $visitor->status ?? '') == 'aktif')>Aktif</option>
        <option value="non-aktif" @selected(old('status', $visitor->status ?? '') == 'non-aktif')>Non-Aktif</option>
        <option value="diblokir" @selected(old('status', $visitor->status ?? '') == 'diblokir')>Diblokir</option>
    </select>
</div>
<div class="mb-3">
    <label>Foto</label>
    <input type="file" name="photo" class="form-control">
    @if(!empty($visitor->photo))
    <img src="{{ asset('storage/' . $visitor->photo) }}" width="100" class="mt-2">
    @endif
</div>