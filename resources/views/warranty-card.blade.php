<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kartu Garansi {{ $productName }} - The Vintage Sneakers</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@500;700;800&family=Archivo:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
  <style>
    :root{color-scheme:light;--ink:#1d1915;--muted:#766e64;--accent:#c9553c;--paper:#f4efe7}
    *{box-sizing:border-box}
    body{margin:0;background:#d8d1c7;color:var(--ink);font-family:Archivo,sans-serif}
    .print-actions{display:flex;justify-content:center;gap:12px;padding:24px}
    .print-actions button,.print-actions a{border:1px solid var(--ink);background:var(--ink);color:#fff;padding:12px 18px;text-decoration:none;font:500 12px 'IBM Plex Mono',monospace;cursor:pointer}
    .print-actions a{background:transparent;color:var(--ink)}
    .warranty-card{width:min(210mm,calc(100% - 32px));min-height:148mm;margin:10px auto 40px;padding:16mm;background:var(--paper);position:relative;overflow:hidden;box-shadow:0 18px 50px rgba(29,25,21,.18)}
    .warranty-card:after{content:'AUTHENTICATED';position:absolute;right:-45px;bottom:28px;color:rgba(201,85,60,.1);font:800 56px 'Big Shoulders Display',sans-serif;letter-spacing:.04em;transform:rotate(-28deg)}
    .card-head{display:flex;justify-content:space-between;gap:24px;border-bottom:1px solid rgba(29,25,21,.25);padding-bottom:18px}
    .brand{font:800 25px 'Big Shoulders Display',sans-serif;letter-spacing:.03em;text-transform:uppercase}
    .eyebrow{color:var(--accent);font:500 10px 'IBM Plex Mono',monospace;letter-spacing:.12em;text-transform:uppercase}
    h1{font:800 45px/.95 'Big Shoulders Display',sans-serif;text-transform:uppercase;margin:12px 0 0;max-width:300px}
    .serial{text-align:right;font:500 10px/1.6 'IBM Plex Mono',monospace;color:var(--muted)}
    .serial strong{display:block;color:var(--ink);font-size:15px;letter-spacing:.08em}
    .card-grid{display:grid;grid-template-columns:1.3fr 1fr;gap:30px;margin-top:28px}
    .field{border-bottom:1px solid rgba(29,25,21,.2);padding:0 0 12px;margin-bottom:17px}.field label{display:block;color:var(--muted);font:500 9px 'IBM Plex Mono',monospace;letter-spacing:.08em;text-transform:uppercase;margin-bottom:6px}.field p{margin:0;font-size:15px}
    .terms{border-top:2px solid var(--ink);padding-top:14px;margin-top:6px;font-size:11px;line-height:1.6}.terms strong{font-size:13px}.terms ul{margin:9px 0 0;padding-left:17px}
    .stamp{border:1px solid var(--accent);color:var(--accent);padding:18px;text-align:center;align-self:start}.stamp strong{display:block;font:800 35px 'Big Shoulders Display',sans-serif}.stamp span{font:500 10px 'IBM Plex Mono',monospace;text-transform:uppercase}
    .card-foot{display:flex;justify-content:space-between;gap:20px;border-top:1px solid rgba(29,25,21,.25);margin-top:26px;padding-top:14px;color:var(--muted);font:10px/1.5 'IBM Plex Mono',monospace}.card-foot span:last-child{text-align:right}
    @media(max-width:600px){.warranty-card{padding:28px 22px}.card-head,.card-grid{display:block}.serial{text-align:left;margin-top:20px}.stamp{margin:20px 0}.card-foot{display:block}.card-foot span{display:block;margin-top:8px}.card-foot span:last-child{text-align:left}}
    @media print{body{background:#fff}.print-actions{display:none}.warranty-card{width:210mm;min-height:148mm;margin:0;box-shadow:none;page-break-inside:avoid}.warranty-card:after{display:block}@page{size:A4 portrait;margin:0}}
  </style>
</head>
<body>
  <div class="print-actions"><button type="button" onclick="window.print()">Cetak / Simpan PDF</button><a href="{{ route('cart') }}">Kembali ke keranjang</a></div>
  <main class="warranty-card">
    <header class="card-head">
      <div><div class="brand">The Vintage Sneakers</div><div class="eyebrow">Official warranty card</div><h1>Pair<br>protected.</h1></div>
      <div class="serial">Warranty ID<strong>TVS-{{ $serial }}</strong>Issued {{ $purchaseDate->format('d.m.Y') }}</div>
    </header>
    <div class="card-grid">
      <section>
        <div class="field"><label>Nama</label><p>{{ $customerName }}</p></div>
        <div class="field"><label>Email</label><p>{{ $customerEmail }}</p></div>
        <div class="field"><label>Pair terdaftar</label><p>{{ $productName }} / Size {{ $size }}</p></div>
        <div class="field"><label>Tanggal pembelian</label><p>{{ $purchaseDate->translatedFormat('d F Y') }}</p></div>
      </section>
      <aside>
        <div class="stamp"><strong>{{ $warrantyMonths }} BULAN</strong><span>Perlindungan kondisi</span></div>
        <div class="field"><label>Berlaku sampai</label><p>{{ $expiresAt->translatedFormat('d F Y') }}</p></div>
      </aside>
    </div>
    <section class="terms"><strong>Ketentuan singkat</strong><ul><li>Garansi berlaku {{ $warrantyMonths }} bulan sejak tanggal pembelian untuk cacat material atau pekerjaan yang menjadi tanggung jawab The Vintage Sneakers.</li><li>Garansi keaslian berlaku seumur hidup berdasarkan provenance file pasangan ini.</li><li>Tidak mencakup aus pemakaian, perubahan warna alami, kerusakan karena air/panas, salah perawatan, atau reparasi pihak lain.</li><li>Simpan kartu ini dan bukti pembelian. Hubungi kami melalui WhatsApp untuk pengajuan klaim.</li></ul></section>
    <footer class="card-foot"><span>Every pair verified by hand.<br>Jl. Braga No. 12, Bandung</span><span>the.vintagesneakers<br>Warranty department</span></footer>
  </main>
</body>
</html>