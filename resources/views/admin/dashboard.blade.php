<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | GlowCare.</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-pink: #f2a2b8;
            --deep-burgundy: #4a1525;
            --soft-bg: #fff0f3;
            --accent-pink: #d9658b;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Plus Jakarta Sans', sans-serif; }
        body { background-color: #faf4f5; color: #333; display: flex; min-height: 100vh; }

        /* Sidebar Styling */
        .sidebar { width: 260px; background: var(--deep-burgundy); color: white; padding: 30px 20px; display: flex; flex-direction: column; justify-content: space-between; }
        .sidebar-brand { font-size: 32px; font-weight: 800; color: var(--primary-pink); letter-spacing: -1px; margin-bottom: 40px; text-decoration: none; display: block; }
        .sidebar-menu { list-style: none; }
        .sidebar-menu li { margin-bottom: 12px; }
        .sidebar-menu a { display: block; color: #e2c0c9; text-decoration: none; padding: 12px 16px; border-radius: 12px; font-weight: 600; font-size: 14px; transition: 0.3s; }
        .sidebar-menu a.active, .sidebar-menu a:hover { background: rgba(255, 255, 255, 0.1); color: white; }

        /* Main Content Styling */
        .main-content { flex: 1; padding: 40px; overflow-y: auto; }
        .top-nav { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .page-title { font-size: 26px; font-weight: 800; color: var(--deep-burgundy); }
        .user-badge { background: white; padding: 8px 18px; border-radius: 20px; border: 1px solid #ebd4da; font-size: 13px; font-weight: 600; color: var(--deep-burgundy); }

        /* Cards & Stats */
        .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px; }
        .stat-card { background: white; padding: 20px; border-radius: 16px; border: 1px solid #ebd4da; }
        .stat-card h4 { font-size: 12px; color: #888; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; }
        .stat-card .value { font-size: 28px; font-weight: 800; color: var(--accent-pink); }

        /* Form & Table Layout */
        .layout-grid { display: grid; grid-template-columns: 1fr 2fr; gap: 30px; }
        .card-box { background: white; padding: 25px; border-radius: 20px; border: 1px solid #ebd4da; }
        .card-box h3 { font-size: 18px; font-weight: 700; color: var(--deep-burgundy); margin-bottom: 20px; }

        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; font-size: 13px; font-weight: 600; color: var(--deep-burgundy); margin-bottom: 6px; }
        .form-group input, .form-group textarea { width: 100%; padding: 10px 14px; border: 1px solid #ebd4da; border-radius: 10px; font-size: 13px; outline: none; }
        .form-group input:focus, .form-group textarea:focus { border-color: var(--accent-pink); }

        .btn-submit { background: var(--deep-burgundy); color: white; width: 100%; padding: 12px; border: none; border-radius: 25px; font-weight: 700; cursor: pointer; font-size: 13px; transition: 0.3s; }
        .btn-submit:hover { background: var(--accent-pink); }

        /* Product Table */
        .table-responsive { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; text-align: left; font-size: 13px; }
        th { background: var(--soft-bg); color: var(--deep-burgundy); padding: 12px 15px; font-weight: 700; border-bottom: 2px solid #ebd4da; }
        td { padding: 12px 15px; border-bottom: 1px solid #f2e4e7; vertical-align: middle; }
        .product-img { width: 45px; height: 45px; object-fit: cover; border-radius: 8px; }
        .btn-delete { background: #dc3545; color: white; border: none; padding: 6px 12px; border-radius: 12px; font-weight: 600; cursor: pointer; font-size: 11px; }

        .alert-success { background: #d4edda; color: #155724; padding: 12px; border-radius: 10px; margin-bottom: 20px; font-size: 13px; }
    </style>
</head>
<body>

    <!-- Sidebar Admin -->
    <div class="sidebar">
        <div>
            <a href="/" class="sidebar-brand">GlowCare.</a>
            <ul class="sidebar-menu">
                <li><a href="#" class="active">📦 Kelola Produk</a></li>
                <li><a href="/" target="_blank">🌐 Lihat Web Pengguna</a></li>
            </ul>
        </div>
        <div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" style="background: transparent; border: 1px solid #ebd4da; color: white; width: 100%; padding: 10px; border-radius: 12px; cursor: pointer; font-weight: 600;">Logout</button>
            </form>
        </div>
    </div>

    <!-- Main Admin Dashboard -->
    <div class="main-content">
        <div class="top-nav">
            <div class="page-title">Dashboard Manajemen Produk</div>
            <div class="user-badge">👑 Admin: {{ auth()->user()->name }}</div>
        </div>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <!-- Summary Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <h4>Total Produk</h4>
                <div class="value"><?php echo isset($products) ? count($products) : 0; ?></div>
            </div>
            <div class="stat-card">
                <h4>Brand Aktif</h4>
                <div class="value">GlowCare.</div>
            </div>
            <div class="stat-card">
                <h4>Status Sistem</h4>
                <div class="value" style="font-size: 18px; color: #28a745;">🟢 Online</div>
            </div>
        </div>

        <div class="layout-grid">
            <!-- Form Tambah Produk -->
            <div class="card-box">
                <h3>+ Tambah Produk Skincare</h3>
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama Produk:</label>
                        <input type="text" name="name" required placeholder="Contoh: Hydrating Serum">
                    </div>
                    <div class="form-group">
                        <label>Brand / Merk:</label>
                        <input type="text" name="brand" value="GlowCare.">
                    </div>
                    <div class="form-group">
                        <label>Harga (Rp):</label>
                        <input type="number" name="price" required placeholder="129000">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Produk:</label>
                        <textarea name="description" rows="3" placeholder="Deskripsikan manfaat dan tipe kulit yang cocok..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Foto Produk:</label>
                        <input type="file" name="image" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn-submit">Simpan & Terbitkan</button>
                </form>
            </div>

            <!-- Tabel Daftar Produk -->
            <div class="card-box">
                <h3>Daftar Produk di Katalog</h3>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($products) && count($products) > 0): ?>
                                <?php foreach ($products as $p): ?>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/' . $p->image) }}" class="product-img" alt="Produk">
                                        </td>
                                        <td>
                                            <strong>{{ $p->name }}</strong><br>
                                            <small style="color: #888;">{{ $p->brand }}</small>
                                        </td>
                                        <td style="font-weight: 700; color: var(--accent-pink);">
                                            Rp {{ number_format($p->price, 0, ',', '.') }}
                                        </td>
                                        <td>
                                            <form action="{{ route('products.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" style="text-align: center; color: #888; padding: 20px;">Belum ada produk yang ditambahkan.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>