@include('template.home.inc.header')
  @include('template.home.inc.left-bar')
      <!-- Nav tabs -->
      <ul class=" ml-5 nav nav-tabs" id="navId">
        <li class="nav-item">
          <a href="#" class="nav-link disabled">Book</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link disabled">All rooms</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link disabled">Bookings</a>
        </li>
      </ul>
      <div class="row mt-5">
          <div class="col-sm-2"></div>
          <div class="col-sm-4 ">
            <div class="col-sm-8 search">
              <div class="form-group">
                <label for="date"></label>
                <input type="date" name="date" id="" class="form-control" placeholder="Mon,28 june 2022">
              </div>
            </div>
          </div>
          <div class="col-sm-4 ">
            <div class="col-sm-8 search">
              <div class="form-group">
                <label for="select"></label>
                <select class="form-control" name="select" id="">
                  <option>8h</option>
                  <option>8h30</option>
                  <option>9h</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-sm-2"></div>
      </div>
      @foreach ($room_lists as $room_list)
        @php
          $slug = Str::slug($room_list->name);
          $url_book = route('home.book', ['id' => $room_list->id]);
        @endphp
        <div class="row ml-2 mt-3 room">
          <div class="col-sm-2"></div>
          <div class="col-sm-8 mt-3">
            <div class="row">
              <div class="col-sm-8">
                <div class="tr mb-2">
                  <a href="{{ $url_book }}" style="text-decoration: none">
                    <h5>{{ $room_list->name }}</h5>
                  </a>
                  
                </div>
                <a href="{{ $url_book }}"><img src="/home/img/screenshot_1.png" alt="" style="width: 100%"></a>
              </div>
              <div class="col-sm-4 gio">
                <div class="giocon">09:00</div>
                <div class="giocon">10:00</div>
                <div class="giocon">11:00</div>
                <div class="giocon">12:00</div>
                <div class="giocon">13:00</div>
                <div class="giocon">14:00</div>
                <div class="giocon">15:00</div>
                <div class="giocon">16:00</div>
                <div class="giocon">17:00</div>
              </div>
            </div>
          </div>
          <div class="col-sm-2"></div>
        </div>
      @endforeach
      
      
   
@include('template.home.inc.footer')