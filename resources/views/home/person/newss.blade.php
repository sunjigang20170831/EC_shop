@extends('home.person')
	@section('centent')
	<div class="main-wrap">
					  <div class="am-u-md-9">
    <article class="blog-main">
      <h3 class="am-article-title blog-title">
        {{$list->title}}
      </h3>
      <h4 class="am-article-meta blog-meta">{{date('Y-m-d H:i:s',$list->time)}}</h4>

      <div class="am-g blog-content">
        <div  class="am-u-sm-12">
        <body>
        <div id="html">{{$list->content}}</div>
      </body>
        
      
       
        </div>
   </div>
     

    </article>


    <hr class="am-article-divider blog-hr">
    
  </div>
				</div>
				<!--底部-->
				@endsection