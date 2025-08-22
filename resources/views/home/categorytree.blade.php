@foreach($children as $subcategory)
        @if(count($subcategory->children))
             <li><a  class="dropdown-item"  href="{{route('categoryarts',['id'=>$subcategory->id,'slug'=>$subcategory->title])}}">{{$subcategory->title}}</a></li>         
                <ul class="dropdown-menu">
                    @include('home.categorytree',['children'=>$subcategory->children])
                </ul>
        @else
        <li><a class="dropdown-item"  href="{{route('categoryarts',['id'=>$subcategory->id,'slug'=>$subcategory->title])}}">{{$subcategory->title}}</a>
        @endif 
  @endforeach