@extends('atemplate')
@section('head')
    
<title>CKEditor</title>
<script src="https://cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>
@endsection
@section('main')


     <!--main content start-->
     <section id="main-content">
      
   
        
            <section class="wrapper site-min-height">
            <div>
                <h4><i class="fa fa-angle-right"></i> Judul Article</h4>
                <div class="row mt">
                    <div class="col-sm-6">
                            <input type="text" class="form-control" name="judul" id="judul" value="Lorem Ipsum" placeholder="judul">
                    </div>
                </div>      
            </div>
            <br>
            <div>
                <h4><i class="fa fa-angle-right"></i> Gambar Sampul</h4>
                <div class="row mt">
                    <div class="col-sm-6">
                           <input class="btn btn-success" class="form-control" type="file" name="sampul" id="sampul">
                    </div>
                </div>
                <div class="row mt mb">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
                            <div class="project-wrapper">
                                <div class="project">
                                    <div class="photo-wrapper">
                                        <div class="photo">
                                            <a class="fancybox" href="{{ asset('public/images/logo.png') }}"><img class="img-responsive" src="{{ asset('public/images/vg2.png') }}" alt=""></a>
                                        </div>
                                        <div class="overlay"></div>
                                    </div>
                                </div>
                            </div>
                    </div><!-- col-lg-4 -->   
            </div>
            <br>
            <div>
                <h4><i class="fa fa-angle-right"></i> Gambar Preview</h4>
                <div class="row mt">
                    <div class="col-sm-6">
                            <input class="btn btn-info" class="form-control" type="file" name="sampul" id="sampul">
                    </div>
                </div>   
                    <div class="row mt mb">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
                            <div class="project-wrapper">
                                <div class="project">
                                    <div class="photo-wrapper">
                                        <div class="photo">
                                            <a class="fancybox" href="{{ asset('public/images/logo.png') }}"><img class="img-responsive" src="{{ asset('public/images/logo.png') }}" alt=""></a>
                                        </div>
                                        <div class="overlay"></div>
                                    </div>
                                </div>
                            </div>
                    </div><!-- col-lg-4 -->   
            </div>
            <br>
            <div>
                <h4><i class="fa fa-angle-right"></i> Kategori</h4>
                <div class="row mt">
                    <div class="col-sm-6">
                            <input list="category" class="form-control" placeholder="double klik to show list" value="News" id="kategori" name="kategori">
                            <datalist id="category">
                              <option value="News">
                              <option value="Tips & Trick">
                              <option value="Review">
                              <option value="Esport">
                            </datalist>
                    </div>
                </div>      
            </div>
            <br>
            <div>
                <h4><i class="fa fa-angle-right"></i> Isi Article</h4>
                <div class="row mt">
                    <div class="col-lg-12">
                            <textarea name="editor1" id="isi"><h3>Lorem Ipsum: when, and when not to use it</h3>

                                <p>Do you like Cheese Whiz? Spray tan? Fake eyelashes? That&#39;s what is Lorem Ipsum to many&mdash;it rubs them the wrong way, all the way. It&#39;s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we&#39;d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.</p>
                                
                                <p>The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods, the paint you may slap on your face to impress the new boss is your business. But what about your daily bread? Design comps, layouts, wireframes&mdash;will your clients accept that you go about things the facile way? Authorities in our business will tell in no uncertain terms that Lorem Ipsum is that huge, huge no no to forswear forever. Not so fast, I&#39;d say, there are some redeeming factors in favor of greeking text, as its use is merely the symptom of a worse problem to take into consideration.</p>
                                
                                <p><img alt="" class="responsive" src=" {{ asset('public/images/post-4.jpg') }} " style="height:400px; width:600px" /></p>
                                
                                <p>So Lorem Ipsum is bad (not necessarily)</p>
                                
                                <p>You begin with a text, you sculpt information, you chisel away what&#39;s not needed, you come to the point, make things clear, add value, you&#39;re a content person, you like words. Design is no afterthought, far from it, but it comes in a deserved second. Anyway, you still use Lorem Ipsum and rightly so, as it will always have a place in the web workers toolbox, as things happen, not always the way you like it, not always in the preferred order. Even if your less into design and more into content strategy you may find some redeeming value with, wait for it, dummy copy, no less.</p>
                                
                                <p>There&#39;s lot of hate out there for a text that amounts to little more than garbled words in an old language. The villagers are out there with a vengeance to get that Frankenstein, wielding torches and pitchforks, wanting to tar and feather it at the least, running it out of town in shame.</p>
                                
                                <p>One of the villagers, Kristina Halvorson from Adaptive Path, holds steadfastly to the notion that design can&rsquo;t be tested without real content:</p>
                                
                                <blockquote>I&rsquo;ve heard the argument that &ldquo;lorem ipsum&rdquo; is effective in wireframing or design because it helps people focus on the actual layout, or color scheme, or whatever. What kills me here is that we&rsquo;re talking about creating a user experience that will (whether we like it or not) be DRIVEN by words. The entire structure of the page or app flow is FOR THE WORDS.</blockquote>
                                
                                <p>If that&#39;s what you think how bout the other way around? How can you evaluate content without design? No typography, no colors, no layout, no styles, all those things that convey the important signals that go beyond the mere textual, hierarchies of information, weight, emphasis, oblique stresses, priorities, all those subtle cues that also have visual and emotional appeal to the reader. Rigid proponents of content strategy may shun the use of dummy copy but then designers might want to ask them to provide style sheets with the copy decks they supply that are in tune with the design direction they require.</p>
                                
                                <h3>Summing up, if the copy is diverting attention from the design it&rsquo;s because it&rsquo;s not up to task.</h3>
                                
                                <p>Typographers of yore didn&#39;t come up with the concept of dummy copy because people thought that content is inconsequential window dressing, only there to be used by designers who can&rsquo;t be bothered to read. Lorem Ipsum is needed because words matter, a lot. Just fill up a page with draft copy about the client&rsquo;s business and they will actually read it and comment on it. They will be drawn to it, fiercely. Do it the wrong way and draft copy can derail your design review.</p>
                                </textarea>
                            <script>
                                    CKEDITOR.replace( 'editor1' );
                            </script>
                    </div>

                </div>  
                <br>
                <div>
                        <h4><i class="fa fa-angle-right"></i>  <a class="btn btn-danger" href="{{ url('admin-vg/galery', []) }}"><i class="fa fa-times"></i></a>
                            <button class="btn btn-success" type="submit">Save</button></h4>

                </div>
            </div>       
          </section><!--/wrapper -->
        </section><!-- /MAIN CONTENT -->

    
@endsection
