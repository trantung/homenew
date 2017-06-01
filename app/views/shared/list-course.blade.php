@foreach ($data as $element)
    <tr class="getinfo">
        <td>
            <div class="img">
                <a href="" title="">
                <img src="/cart-debt/asserts/images/hoc-toan-tu-0.png" class="img-responsive" alt=""/>
                </a>
            </div>
        </td>
        <td>
            <div class="info-giao-vien">
                <div class="text">
                    <h3 class="title">
                        <a href="#" title="" class="getTitle">
                            {{ $element->fullname }}
                        </a>
                    </h3>
                    <div class="gia-mobile hidden-lg hidden-md hidden-sm">
                        <p class="price getPrice">
                            300.000
                        </p>
                        <p class="gia-goc">{{ $element->fee }}</p>
                    </div>
                    <p class="des getDescription">
                        {{ $element->list_teacher }}
                    </p>
                </div>
            </div>
        </td>
        <td class="hidden-xs">
            <p class="price getPrice">
                300.000
            </p>
            <p class="gia-goc">1.100.000</p>
        </td>
        <td class="text-center">
            <label class="checkbox-inline checkClick">
                <input type="checkbox" name="chon-giao-vien" value="option1"> 
                <span class="default cp-choice-bt" data-itemid="{{ $element->package_id }}">Chọn</span> 
                <span class="chooses">Đã Chọn 
                <img src="/cart-debt/asserts/images/da-chon.png" class="img-responsive" alt=""/></span>
            </label>
        </td>
    </tr>
@endforeach
