<footer class="main-footer
{{ Auth::user()->role == 'mahasiswa' ? 'footer-full' : '' }}">
    <div class="footer-left">
        © {{ date('Y') }}
        <strong>KompasKu</strong>
        - Sistem Perencanaan Karier Mahasiswa
    </div>

    <div class="footer-right">
        Jurusan Teknologi Informasi | Politeknik Negeri Malang
    </div>

</footer>

<style>
.main-footer{
    background:#ffffff;
    border-top:1px solid #e5e7eb;
    padding:16px 24px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    color:#64748b;
    font-size:13px;
    font-weight:500;
    margin-left:260px; /* menyesuaikan sidebar admin */
}

.main-footer strong{
    color:#0f172a;
    font-weight:700;
}

.footer-right{
    color:#94a3b8;
}

@media(max-width:768px){

    .main-footer{
        margin-left:0;
        flex-direction:column;
        gap:8px;
        text-align:center;
        padding:15px;
    }

}
.main-footer{
    margin-left:260px;
}

.footer-full{
    margin-left:0 !important;
}
</style>