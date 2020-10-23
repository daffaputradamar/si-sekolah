<footer class="footer">
    <div class="footer_top">
        <div class="container">

            <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Tentang Kami
                        </h3>
                        <img width="150" src="<?php echo base_url(''); ?>style/img/sma-bayat-logo.png" class="rounded" alt="Muris Studio">
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Dashboard
                        </h3>
                        <ul>
                            <li><a href="<?php echo site_url(); ?>">Beranda</a></li>
                            <li><a href="<?php echo site_url('about'); ?>">Tentang Sekolah</a></li>
                            <li><a href="<?php echo site_url('artikel'); ?>">Berita Sekolah</a></li>
                            <li><a href="<?php echo site_url('galeri'); ?>">Galeri Sekolah</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Lainnya
                        </h3>
                        <ul>
                            <li><a href="<?php echo site_url('guru'); ?>">Daftar Guru</a></li>
                            <li><a href="<?php echo site_url('pengumuman'); ?>">Pengumuman</a></li>
                            <li><a href="<?php echo site_url('agenda'); ?>">Agenda</a></li>
                            <li><a href="<?php echo site_url('download'); ?>">Download File</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Kirim Pesan
                        </h3>

                        <form action="<?php echo base_url() . 'admin/bukutamu/simpan_pesan' ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="namatamu">Nama</label>
                                <input type="text" class="form-control" id="namatamu" name="namatamu">
                            </div>
                            <div class="form-group">
                                <label for="pesan">Pesan</label>
                                <textarea name="pesan" id="pesan" rows="5" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script>
                        </p>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end  -->


<!-- JS here -->
<script src="<?php echo base_url(''); ?>style/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="<?php echo base_url(''); ?>style/js/vendor/jquery-1.12.4.min.js"></script>
<script src="<?php echo base_url(''); ?>style/js/popper.min.js"></script>
<script src="<?php echo base_url(''); ?>style/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(''); ?>style/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(''); ?>style/js/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url(''); ?>style/js/ajax-form.js"></script>
<script src="<?php echo base_url(''); ?>style/js/waypoints.min.js"></script>
<script src="<?php echo base_url(''); ?>style/js/jquery.counterup.min.js"></script>
<script src="<?php echo base_url(''); ?>style/js/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo base_url(''); ?>style/js/scrollIt.js"></script>
<script src="<?php echo base_url(''); ?>style/js/jquery.scrollUp.min.js"></script>
<script src="<?php echo base_url(''); ?>style/js/wow.min.js"></script>
<script src="<?php echo base_url(''); ?>style/js/nice-select.min.js"></script>
<script src="<?php echo base_url(''); ?>style/js/jquery.slicknav.min.js"></script>
<script src="<?php echo base_url(''); ?>style/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(''); ?>style/js/plugins.js"></script>
<script src="<?php echo base_url(''); ?>style/js/gijgo.min.js"></script>

<!--contact js-->
<script src="<?php echo base_url(''); ?>style/js/contact.js"></script>
<script src="<?php echo base_url(''); ?>style/js/jquery.ajaxchimp.min.js"></script>
<script src="<?php echo base_url(''); ?>style/js/jquery.form.js"></script>
<script src="<?php echo base_url(''); ?>style/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(''); ?>style/js/mail-script.js"></script>
<script src="<?php echo base_url() . 'theme/js/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/dataTables.bootstrap4.min.js' ?>"></script>
<script>
    $(document).ready(function() {
        $('#display').DataTable();
    });
</script>
<script src="<?php echo base_url(''); ?>style/js/main.js"></script>

</body>

</html>