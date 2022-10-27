<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages | Firebase</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
        <form action="" id="contactForm">
            <div class="alert">Your message sent</div>

            <div class="inputBox">
                <p>Nama Perusahaan: </p>
                <input type="text" id="name" placeholder="Nama perusahaan" />
            </div>

            <div class="inputBox">
                <p>Group: </p>
                <input type="email" id="emailid" placeholder="Group" />
            </div>

            <div class="inputBox">
                <p>Status: </p>
                <select name="status">Status: 
                    <option value="pusat">Kantor Pusat
                    <option value="cabang">Cabang
                    <option value="side">Side
                </select>
            </div>

            <div class="inputBox">
                <p>Koordinat: </p>
                <input type="text" id="emailid" placeholder="Group" />
            </div>

            <div class="inputBox">
                <p>Wilayah Kabupaten/Provinsi: </p>
                <input type="text" id="emailid" placeholder="Wilayah Kabupaten/Provinsi" />
            </div>

            <div class="inputBox">
                <p>Jenis Industri: </p>
                <input type="text" id="emailid" placeholder="Jenis Industri" />
            </div>

            <div class="inputBox">
                <p>Tipe Customer: </p>
                <select name="tipe">Tipe Customer: 
                    <option value="pusat">Kantor Pusat
                    <option value="cabang">Cabang
                    <option value="side">Side
                </select>
            </div>

            <div class="inputBox">
                <p>Disupply oleh: </p>
                <input type="text" id="emailid" placeholder="Disupply oleh" />
            </div>

            <div class="inputBox">
                <p>Penyalur: </p>
                <input type="text" id="emailid" placeholder="Penyalur" />
            </div>

            <div class="inputBox">
                <p>Pelayanan: </p>
                <input type="text" id="emailid" placeholder="Pelayanan" />
            </div>

            <div class="inputBox">
                <button type="submit">Submit</button>
            </div>
        </form>
    

    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js"></script>
    <script src="js/mail.js"></script>
</body>

</html>