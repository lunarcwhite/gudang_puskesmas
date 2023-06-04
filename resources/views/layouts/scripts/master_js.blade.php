<script>
    (function() {
        'use strict';
        //secara default sidenav dalam mode hide, kode dibawah untuk menampilkan sidenav saat pertama load di layar lebih 992
        if (window.innerWidth >= 992) {
            teSidenav.toggle();
        }
        // fungsi teSidenav.isShow() mengembalikan nilai true jika sidenav dalam keadaan aktif dan false jika sebaliknya
        if (window.innerWidth < 768 && teSidenav.isShow()) {
            teSidenav.toggle()
        }
        //DataTable
        $('#myTable').DataTable();

    })()
</script>