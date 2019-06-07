@if(count($bu) > 0)


    @foreach($bu as $key => $b)
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
        <div class="db-wrapper">
            <div class="db-pricing-eleven db-bk-color-six">
                <div class="price">
                    <sup>$</sup>{{ $b->price }}
                </div>
                <div class="type">
                    {{ $b->name }}
                </div>
                <div class="type">
                    <img src="{{ checkIfImageExist($b->image) }}" class="img-responsive img-rounded text-center" style="height: 128px;" width="100%" >
                </div>
                <ul>
                    <li><i class="fa fa-globe"></i>  {{ bu_place()[$b->place] }}</li>
                    <li><i class="fa fa-bell-o"></i>{{ bu_type()[$b->type] }}</li>
                    <li><i class="fa fa-renren"></i>{{ bu_rent()[$b->rent] }} </li>
                    <li><i class="fa fa-square-o"></i>  {{ $b->square }}</li>
                    <li><i class="fa fa-home"></i>  {{ $b->rooms }}</li>
                </ul>
                <div class="pricing-footer">
                    <a href="{{ url('/showBu/' . $b->id) }}" class="btn db-button-color-square btn-lg"> عرض العقار </a>
                </div>
            </div>
        </div>
    </div>
        @if($key+1 % 3 == 0)
            <div class="clearfix"></div>
        @endif
        @endforeach
    <div class="clearfix"></div>
    @else
    <div class="col-xs-12">
        <div class="alert alert-danger text-center">
            لا يوجد أي عقارات حالياً
        </div>
    </div>

    @endif

