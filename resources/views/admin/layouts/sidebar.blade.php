@php
$url_components = explode('/', Request::url())
@endphp
<div class="sidebar-wrapper"> 
          <div>
            <div class="logo-wrapper"><a href="index-2.html"><img class="img-fluid for-light " src="{{asset('admin/assets/images/login/teammoneylogo.png')}}" alt=""><img class="img-fluid for-dark" src="../assets/images/logo/small-white-logo.png" alt=""></a>
              <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="index-2.html"><img class="img-fluid" src="{{asset('admin/assets/images/login/teammoneylogo.png')}}" alt=""></a></div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="back-btn"><a href="index-2.html"><img class="img-fluid" src="{{asset('admin/assets/images/login/teammoneylogo.png')}}" alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true">        </i></div>
                  </li>
                  <li class="sidebar-list">
                    <label class="badge badge-light-primary">2</label><a class="sidebar-link sidebar-title" href="#">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                          <g> 
                            <path d="M9.07861 16.1355H14.8936" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.3999 13.713C2.3999 8.082 3.0139 8.475 6.3189 5.41C7.7649 4.246 10.0149 2 11.9579 2C13.8999 2 16.1949 4.235 17.6539 5.41C20.9589 8.475 21.5719 8.082 21.5719 13.713C21.5719 22 19.6129 22 11.9859 22C4.3589 22 2.3999 22 2.3999 13.713Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          </g>
                        </g>
                      </svg><span class="lan-3">Dashboard              </span></a>
                    <ul class="sidebar-submenu">
                      <li><a class="lan-4" href="">Default</a></li>
                      <li><a class="lan-5" href="dashboard-02.html">E-commerce</a></li>
                      <li><a href="crypto-dashboard.html">Crypto</a></li>
                    </ul>
                  </li>
                  
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                          <g> 
                            <path d="M15.596 15.6963H8.37598" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M15.596 11.9365H8.37598" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M11.1312 8.17725H8.37622" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.61011 12C3.61011 18.937 5.70811 21.25 12.0011 21.25C18.2951 21.25 20.3921 18.937 20.3921 12C20.3921 5.063 18.2951 2.75 12.0011 2.75C5.70811 2.75 3.61011 5.063 3.61011 12Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          </g>
                        </g>
                      </svg>
                      <span > Member Management</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="{{route('registers.index')}}">Manage members</a></li>
                    </ul>
                  </li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                          <g> 
                            <path d="M15.596 15.6963H8.37598" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M15.596 11.9365H8.37598" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M11.1312 8.17725H8.37622" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.61011 12C3.61011 18.937 5.70811 21.25 12.0011 21.25C18.2951 21.25 20.3921 18.937 20.3921 12C20.3921 5.063 18.2951 2.75 12.0011 2.75C5.70811 2.75 3.61011 5.063 3.61011 12Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          </g>
                        </g>
                      </svg>
                      <span class="">Group Management</span></a>
                    <ul class="sidebar-submenu">
                    <li><a href="{{route('group.index')}}"> Group List</a></li>
                      <!-- <li><a href="{{route('group.create')}}">create groups</a></li> -->
                    
                    </ul>
                  </li>

                  <li class="sidebar-list">
                    <label class="badge badge-light-info">New</label><a class="sidebar-link sidebar-title" href="#">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                          <g>
                            <path d="M14.3053 15.45H8.90527" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M12.2604 11.4387H8.90442" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.1598 8.3L14.4898 2.9C13.7598 2.8 12.9398 2.75 12.0398 2.75C5.74978 2.75 3.64978 5.07 3.64978 12C3.64978 18.94 5.74978 21.25 12.0398 21.25C18.3398 21.25 20.4398 18.94 20.4398 12C20.4398 10.58 20.3498 9.35 20.1598 8.3Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M13.9342 2.83276V5.49376C13.9342 7.35176 15.4402 8.85676 17.2982 8.85676H20.2492" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          </g>
                        </g>
                      </svg><span>Meeting Management</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="{{route('teamMeeting.index')}}"> Team Meetings </a></li>
                      <!-- <li><a href="{{route('teamMeeting.create')}}">Create new</a></li> -->
                     
                    </ul>
                  </li>
               
                    
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>