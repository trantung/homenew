<section id="intro">
    <div class="container blur-background section-content">
        <div class="row">
            @if ($currentMenu->program)
                @if ($block == 1)
                    <div class="col-md-6">
                        <div class="in-item in-item-l">
                            <div class="in-head main-gradient">
                                {{ $currentMenu->name }} là gì ?
                            </div>
                            <div class="in-body">
                                {{ $currentMenu->program->description_object }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="in-item in-item-l">
                            <div class="in-head main-gradient">
                                {{ $currentMenu->name }} dành cho ai ?
                            </div>
                            <div class="in-body">
                                {{ $currentMenu->program->description_program }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="intro-desc">
                                {{ $currentMenu->program->description }}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-6">
                        <div class="in-item in-item-l">
                            <div class="in-head main-gradient">
                                    Chương trình
                                {{ $currentMenu->name }} dành cho ai ?
                            </div>
                            <div class="in-body">
                                {{ $currentMenu->program->description_program }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="in-item in-item-l">
                            <div class="in-head main-gradient">
                                    Chương trình
                                {{ $currentMenu->name }} là gì ?
                            </div>
                            <div class="in-body">
                                {{ $currentMenu->program->description_object }}
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
</section>
