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
                <img src="https://static.thenounproject.com/png/503257-200.png" alt="" style="width: 50px;
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
                <p style="font-size: 24px;"><?= $title?></p>
                <p style="text-align: justify; padding:0 25px;">
                   
                        Hai, <?= $name;?>. Selamat kamu telah terdaftar pada akun kami, selamat bergabung di situs kami. Untuk mengaktifkan akun ini perlu verifikasi akun anda untuk keamanan data pribadi kamu. Klik tombol aktivasi dibawah ini.
                    
                </p>
                <p style="margin-top: 50px;margin-bottom:50px;">
                    <a href="<?= base_url($url);?>" style="width: auto;
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
                       Konfirmasi Email
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
                    <i><img src="https://i.pinimg.com/474x/04/c6/32/04c6329b172debd397e990fe8bcc779a.jpg" alt="" style="width: 50px;height: 50px;border-radius: 40%;"></i>
                    <i><img src="https://png.pngtree.com/element_our/png_detail/20181011/facebook-social-media-icon-design-template-vector-png_127003.jpg" alt="" style="width: 50px;height: 50px;border-radius: 40%;"></i>
                    <i><img src="https://w7.pngwing.com/pngs/914/758/png-transparent-github-social-media-computer-icons-logo-android-github-logo-computer-wallpaper-banner.png" alt="" style="width: 50px;height: 50px;border-radius: 40%;"></i>
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