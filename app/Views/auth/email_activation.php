<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<body>
    <div style="
        background-color: rgb(242, 242, 242);
        display: flex;
        font-family: Arial;">
        <div style=" width: 100%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        text-align: center;
        margin: 25px;
        border-radius: 4px;
        border: 1.5px solid rgba(0, 0, 0, 0.2);">
            <div style="
        padding: 10px;
        background-color: white;
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
        margin: 0;
        display: flex;
        align-items: center;justify-content:space-between;">
                <img src="https://scontent.fupg1-1.fna.fbcdn.net/v/t1.6435-9/118275420_2748858878690837_5548843902803421130_n.jpg?_nc_cat=107&ccb=1-3&_nc_sid=174925&_nc_eui2=AeGvMB6Lc9tBtcNWH9wzFE6znCeho58ruJScJ6Gjnyu4lOIC2xoUAboLFLajH3O1Q0Qn1yu47l9dSIEVKTNyhzFl&_nc_ohc=MnO52JtySx0AX_b1gHn&_nc_ht=scontent.fupg1-1.fna&oh=8cc13f8c7b5b75b99422dcda8c61caf1&oe=60CE449B" alt="" style="width: 50px;
        border-radius: 48%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        height: 50px;
        width: 50px;">
                <h4>b4yu4lex@ndr!4</h4>
                <div style="float:right;">
                    <p style="color:silver;font-size: 12px;"><?= date('M, d Y'); ?></p>
                </div>
            </div>
            <div style="background-color:white;padding: 5px;">
                <p style="font-size: 24px;"><?= $title; ?></p>
                <p style="text-align: justify; padding:0 25px;">
                    <?php if ($title == 'Aktifasi Akun !') : ?>
                        Hai, <?= $name; ?>. Selamat kamu telah terdaftar pada akun kami, selamat bergabung di situs kami. Untuk mengaktifkan akun ini perlu verifikasi akun anda untuk keamanan data pribadi kamu. Klik tombol aktivasi dibawah ini.
                    <?php else : ?>
                        Hai, <?= $name; ?>. Jika kamu butuh bantuan untuk mengganti atau mengubah password yang terlupa. Kami akan membantu kamu untuk mengatasinya yaitu dengan menekan tombol dibawah ini untuk melanjutkan.
                    <?php endif; ?>
                </p>
                <p style="margin-top: 50px;margin-bottom:50px;">
                    <a href="<?= base_url($url); ?>" style="width: auto;
        height: auto;
        padding: 5px 20px;
        border: 1.5px solid rgba(0, 0, 0, 0.2);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        text-decoration: none;
        font-weight: 500;
        color: white;
        background-color: #2E65EF;
        border-radius: 4px;
        font-size: 24px;">
                        <?php if ($title == 'Aktifasi Akun !') : ?>
                            Activation
                        <?php else : ?>
                            Reset password
                        <?php endif; ?>
                    </a>
                </p>
            </div>

            <div style="padding: 5px;
        background-color: white;
        border-top: 1px solid rgba(0, 0, 0, 0.2);
        background-color: #2E65EF;
        color: white;
        text-shadow: 1px 1px 2px #000000;
        word-spacing: 1px;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 4px;">
                <p>
                    Temukan Saya,
                </p>
                <div style="display:inline">
                    <i class="fa fa-facebook"></i>
                    <i><img src="<?= base_url('assets/img/logo/twitter.png'); ?>" alt="" style="width: 50px;height: 50px;border-radius: 40%;"></i>
                    <i><img src="<?= base_url('assets/img/logo/instagram.png'); ?>" alt="" style="width: 50px;height: 50px;border-radius: 40%;"></i>
                    <i><img src="<?= base_url('assets/img/logo/github.png'); ?>" alt="" style="width: 50px;height: 50px;border-radius: 40%;"></i>
                </div>
                <p>
                    Script Code, Jl. Samuel No.50, Dolog. Kelurahan Mandala. Biak-Papua
                </p>
                <p>
                    © <?= date('Y'); ?> created by b4yu4lex@ndr!4
                </p>
            </div>

        </div>
    </div>

</body>