<header class="main-header dark-header fs-header sticky">
                <div class="header-inner">
                    <div class="logo-holder">
                        <a href="index.html"><img src="{{asset('front/images/logo.png')}}" alt=""></a>
                    </div>
                    <div class="header-search vis-header-search">
                        <div class="header-search-input-item">
                            <input type="text" placeholder="Keywords" value=""/>
                        </div>
                        <div class="header-search-select-item">
                            <select data-placeholder="Semua Kategori" class="chosen-select" >
                                <option value="-1">Semua Kategori</option>
                                @foreach ($inves_kat as $item)
                                    <option value="{{$item->id}}">{{$item->kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="header-search-button" onclick="window.location.href='listing.html'">Cari</button>
                    </div>
                    <div class="show-search-button"><i class="fa fa-search"></i> <span>Search</span></div>
                    <a href="#" class="add-list modal-open">Login <span><i class="fa fa-sign-in"></i></span></a>
                    {{-- <div class="show-reg-form modal-open"><i class="fa fa-sign-in"></i>Sign In</div> --}}
                    <!-- nav-button-wrap--> 
                    <div class="nav-button-wrap color-bg">
                        <div class="nav-button">
                            <span></span><span></span><span></span>
                        </div>
                    </div>
                    <!-- nav-button-wrap end-->
                    <!--  navigation --> 
                    <div class="nav-holder main-menu">
                        <nav>
                            <ul>
                                <li>
                                    <a href="{{url('/')}}" class="act-link">Beranda</a>
                                </li>
                                <li>
                                    <a href="#">Tentang Kami <i class="fa fa-caret-down"></i></a>
                                    <!--second level -->
                                    <ul>
                                        <li><a href="{{url('sejarah')}}">Sejarah</a></li>
                                        <li><a href="{{url('visi-misi')}}">Visi Misi</a></li>
                                        <li><a href="{{url('tim-kumpool')}}">Tim Kumpool</a></li>
                                        <li><a href="{{url('hubungi-kami')}}">Hubungi Kami</a></li>
                                       
                                    </ul>
                                    <!--second level end-->
                                </li>
                                <li>
                                    <a href="#">Investasi <i class="fa fa-caret-down"></i></a>
                                    <!--second level -->
                                    <ul>
                                        <li><a href="{{url('investasi')}}">Data Investasi</a></li>
                                        <li><a href="{{url('cara-investasi')}}">Cara Investasi</a></li>
                                       
                                    </ul>
                                    <!--second level end-->
                                </li>
                                <li>
                                    <a href="{{url('blog')}}">Blog</a>
                                </li>
                                {{-- <li>
                                    <a href="#">Pages <i class="fa fa-caret-down"></i></a>
                                    <!--second level -->   
                                    <ul>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="contacts.html">Contacts</a></li>
                                        <li><a href="author-single.html">User single</a></li>
                                        <li><a href="how-itworks.html">How it Works</a></li>
                                        <li><a href="pricing-tables.html">Pricing</a></li>
                                        <li><a href="dashboard-myprofile.html">User Dasboard</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                        <li><a href="dashboard-add-listing.html">Add Listing</a></li>
                                        <li><a href="404.html">404</a></li>
                                        <li><a href="coming-soon.html">Coming Soon</a></li>
                                        <li><a href="header2.html">Header 2</a></li>
                                        <li><a href="footer-fixed.html">Footer Fixed</a></li>
                                    </ul>
                                    <!--second level end-->                                
                                </li> --}}
                                <li>
                                    <a href="{{url('faq')}}">FAQ</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- navigation  end -->
                </div>
            </header>