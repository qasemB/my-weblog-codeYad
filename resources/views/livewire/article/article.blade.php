<main class="main container">

    <div class="row my-4">
      <div id="articleRight" class="col-12 col-md-8 col-xl-9">
        <div class="p-2 bg-light rounded">
          <h1 class="text-center font_2 py-2">{{$article->h_title}}</h1>
          <div class="image text-center">
            <img src="{{$article->image}}" alt="توضیح تصویر">
          </div>
          <div class="p-2 text_container">{!!$article->text!!}
          </div>
        </div>

      </div>

      <div id="articleLeft" class="col-12 col-md-4 col-xl-3 mt-3 mt-md-0">
        <div class="row bg-light px1 py-5 text-center justify-content-center d-flex rounded w-100 m-auto">
          <div class="image rounded-circle overflow-hidden h_10 w_10 text-center justify-content-center">
            <img class="max_w_100 m-auto" src="{{$article->user->image}}" alt="توضیح تصویر">
          </div>

            <div class="col-12 mt-3 justify-content-center">
            <small class="text-center d-block">نویسنده:</small>
            <h6 class="text-center">{{$article->user->name." ".$article->user->lastname}}</h6>

            <small class="text-center d-block mt-3">تاریخ:</small>
            <h6 class="text-center">{{$article->created_at->diffForHumans()}}</h6>

            <div class="col-12 justify-content-center text-center mt-3">
              <span class="text-center">بازدید : {{$article->view_count}} </span>
            </div>

            <div class="col-12 justify-content-center text-center mt-3">
              <a href="#" class="btn rounded_5 btn-outline-dark">دیگر مقالات </a>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="row justify-content-center align-items-center alert-secondary p-3">

      <div class="row p-3 justify-content-center text-right alert-light d-block mb-4 col-12">
          @foreach (explode("-" , $article->keywords) as $key)
              ( <a href="#">{{$key}}</a> )
          @endforeach
        {{-- کلمه کلیدی - کلمه کلیدی - کلمه کلیدی --}}
      </div>

      <div class="col-12 row justify-content-center form-group">
        <input type="text" class="form-control rounded_5 col-12 col-md-8" placeholder="نام نویسنده نظر">
      </div>
      <div class="col-12 row justify-content-center form-group">
        <h5 class="col-12 text-center">متن نظر:</h5>
        <textarea rows="10" class="form-control rounded shadow col-12 col-md-8 "></textarea>
      </div>

      <div class="col-12 col-md-11 bg-white p-3">

        @foreach ($article->comments as $com)

        <div class="row my-2 d-block p-2 rounded shadow-sm border_1 col-11 m-auto shadow">
          <div class="row justify-content-lg-between w-100 m-auto">
            <h6 class="text-right text-success">{{$com->user->name}} <span class="text-danger">{{$com->created_at->diffForHumans()}}</span></h6>
            <span>
              <i class="fas fa-trash text-danger cursor_pointer_text_shadow mx-2"></i>
              <i class="fas fa-edit text-success cursor_pointer_text_shadow mx-2"></i>
            </span>
          </div>
          <div class=" w-100 pb-3">
            <p class="text-justify">{{$com->text}}</p>
            <button class="btn btn-primary rounded_5 px-3 ">پاسخ</button>
          </div>
          {{-- <div class="answer shadow-sm alert-success p-2">
            <h6 class="text-right text-primary">پاسخ</h6>
            <div class="row justify-content-lg-between w-100 m-auto">
              <h6 class="text-right text-info">عباس در تاریخ 99/12/20</h6>
              <span>
                <i class="fas fa-trash text-danger cursor_pointer_text_shadow mx-2"></i>
                <i class="fas fa-edit text-success cursor_pointer_text_shadow mx-2"></i>
              </span>
            </div>
            <p >Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi eveniet maiores distinctio ex maxime minus, deleniti nam in. Voluptas nulla neque mollitia harum. Similique, corporis? Quae temporibus cupiditate quo quis!</p>
          </div> --}}
        </div>
        @endforeach


      </div>
    </div>

  </main>
