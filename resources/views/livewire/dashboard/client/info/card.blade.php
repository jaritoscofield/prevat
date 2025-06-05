<div>
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <p class="mb-0 text-dark fw-semibold">Total de Participantes</p>
                            <h3 class="mt-1 mb-1 text-dark fw-semibold"> {{$participants->count()}}</h3>
                            <span class="text-muted fw-semibold fs-12">Cadastrados nesse contrato</span>
                        </div>
                        <span class="ms-auto my-auto bg-danger-transparent avatar avatar-lg brround text-danger">
                            <i class="fa fa-users fs-4"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <p class="mb-0 text-dark fw-semibold">Total de Agendamentos</p>
                            <h3 class="mt-1 mb-1 text-dark fw-semibold">{{$schedules->count()}}</h3>
                            <span class="text-muted fw-semibold fs-12"><span class="text-white">_</span> </span>
                        </div>
                        <span class="ms-auto my-auto bg-primary-transparent avatar avatar-lg brround text-primary">
                            <i class="fa fa-calendar fs-4"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <p class="mb-0 text-dark fw-semibold">Participantes Presentes</p>
                            <h3 class="mt-1 mb-1 fw-semibold">{{$presences}}</h3>
                            <span class="text-muted fw-semibold fs-12"><span class="text-white">_</span> </span>
                        </div>
                        <span class="ms-auto my-auto bg-secondary-transparent avatar avatar-lg brround text-secondary">
                            <i class="fa fa-user-plus fs-4"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <p class="mb-0 text-dark fw-semibold">Participantes Ausentes</p>
                            <h3 class="mt-1 mb-1 text-dark fw-semibold">{{$absences}}</h3>
{{--                            <span class="text-muted fw-semibold fs-12"><span class="text-primary">05%</span> Higher than Last Month</span>--}}
                            <span class="text-muted fw-semibold fs-12"><span class="text-white">_</span> </span>

                        </div>
                        <span class="ms-auto my-auto bg-info-transparent avatar avatar-lg brround text-info">
                            <i class="fa fa-user-minus fs-4"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
