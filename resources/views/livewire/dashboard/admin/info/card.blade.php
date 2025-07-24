<div>
    <div class="row mb-3">
        <div class="col-12 text-end">
            <a href="{{ route('dashboard.exportar-dados') }}" class="btn btn-primary" target="_blank">
                <i class="fa fa-file-pdf-o"></i> Exportar dados
            </a>
        </div>
    </div>
    <div class="row">
        <!-- Card: Treinamentos ministrados no mês -->
        <div class="col-12 col-md-4 mb-3">
            <div class="card overflow-hidden border-0 shadow-sm" style="background: linear-gradient(90deg, #4e54c8 0%, #8f94fb 100%); color: #fff;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 fw-semibold" style="color: #fff;">Treinamentos no mês</p>
                            <h2 class="mt-1 mb-1 fw-bold" style="color: #fff;">{{$trainingsMonth}}</h2>
                            <span class="fw-semibold fs-12" style="color: #e0e0e0;">Ministrados</span>
                        </div>
                        <span class="ms-auto my-auto avatar avatar-lg brround" style="background: rgba(255,255,255,0.15); color: #fff;">
                            <i class="fa fa-chalkboard-teacher fs-2"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card: Empresas atendidas no mês -->
        <div class="col-12 col-md-4 mb-3">
            <div class="card overflow-hidden border-0 shadow-sm" style="background: linear-gradient(90deg, #11998e 0%, #38ef7d 100%); color: #fff;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 fw-semibold" style="color: #fff;">Empresas atendidas</p>
                            <h2 class="mt-1 mb-1 fw-bold" style="color: #fff;">{{$companiesMonth}}</h2>
                            <span class="fw-semibold fs-12" style="color: #e0e0e0;">No mês</span>
                        </div>
                        <span class="ms-auto my-auto avatar avatar-lg brround" style="background: rgba(255,255,255,0.15); color: #fff;">
                            <i class="fa fa-building fs-2"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card: Turmas extras no mês -->
        <div class="col-12 col-md-4 mb-3">
            <div class="card overflow-hidden border-0 shadow-sm" style="background: linear-gradient(90deg, #ff512f 0%, #dd2476 100%); color: #fff;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 fw-semibold" style="color: #fff;">Turmas extras</p>
                            <h2 class="mt-1 mb-1 fw-bold" style="color: #fff;">{{$extraClassesMonth}}</h2>
                            <span class="fw-semibold fs-12" style="color: #e0e0e0;">No mês</span>
                        </div>
                        <span class="ms-auto my-auto avatar avatar-lg brround" style="background: rgba(255,255,255,0.15); color: #fff;">
                            <i class="fa fa-users-cog fs-2"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row row-sm">
        <div class="col-12">
            <div class="card overflow-hidden">
                <div class="card-header pb-0 border-bottom-0">
                    <h3 class="card-title fs-14">Treinamentos mais agendados</h3>
                </div>
                <div class="card-body pt-0">
                    <div class="d-block d-sm-inline-flex align-items-center my-3">
                        <p class="mb-0 me-5"> <span class="legend bg-blue"></span>Marketing Strategy</p>
                        <p class="mb-0 me-5"> <span class="legend bg-teal"></span>Engaging Audience</p>
                        <p class="mb-0 me-5"> <span class="legend bg-pink"></span>Others</p>
                    </div>
                    <div class="progress br-10 progress-md">
                        <div class="progress-bar lh-1 bg-blue w-20">20%</div>
                        <div class="progress-bar lh-1 bg-cyan w-30">30%</div>
                        <div class="progress-bar lh-1 bg-pink w-50">50%</div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
