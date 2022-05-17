<!-- Custom Tabs -->
<div class="card">
    <div class="card-header d-flex p-0">
        <h3 class="card-title p-3">Tabs</h3>
        <ul class="nav nav-pills ml-auto p-2">
            <li class="nav-item"><a class="nav-link active" id="identitas-diri-tab"
                    onclick="setTabActive('#identitas-diri')" id="identitas-diri" href="#identitas-diri"
                    data-toggle="tab">Identitas
                    Diri</a>
            </li>
            <li class="nav-item"><a class="nav-link" id="data-orang-tua-tab"
                    onclick="setTabActive('#data-orang-tua')" id="data-orang-tua" href="#data-orang-tua"
                    data-toggle="tab">Data Orang
                    Tua</a>
            </li>
        </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="identitas-diri">
                @include('panitia.siswa.identitas-diri')
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="data-orang-tua">
                @include('panitia.siswa.data-orang-tua')
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div><!-- /.card-body -->
</div>
<!-- ./card -->
