{{-- Author: Beh Guo Hao --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TapNGo | Cart</title>
    @include('base.head')
</head>

<body class="sub_page">
    <div class="hero_area">
        <div class="bg-box">
            <img style="filter: brightness(55%)" src="{{ asset('user/images/hero-bg.jpg') }}" alt="">
        </div>
        @include('base.header')
    </div>

         <main class="my-8">
            <div class="container px-6 mx-auto">
                <div class="flex justify-center my-6">
                    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                      @if (Session::has('status'))
                          <div class="status" id="msg">
                              <p class="text-green-800">{{ Session::pull('status'); }}</p>
                          </div>
                      @endif
                      <script>
                          setTimeout(function() {                
                              $("#msg").fadeOut('fast');
                          }, 5000);
                      </script>
                        <h3 class="text-3xl text-bold">Cart List</h3>
                      <div class="flex-1">
                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                          <thead>
                            <tr class="h-12 uppercase">
                              <th class="hidden md:table-cell"></th>
                              <th class="text-left name">Name</th>
                              <th class="pl-5 text-right">
                                <span class="hidden lg:inline">Quantity</span>
                              </th>
                              <th class="hidden text-right md:table-cell"> Price</th>
                              <th class="hidden text-right md:table-cell"> Remove </th>
                            </tr>
                          </thead>
                          <tbody>                            
                              @foreach ($cartItems as $item)                                                                                 
                            <tr>
                              <td class="hidden pb-4 md:table-cell">
                                  <img src="/img/menu/{{ $item['image'] }}" class="w-20 rounded item-img" alt="Thumbnail">
                              </td>
                              <td>
                                  <p class="mb-2 md:ml-4">{{ $item['menu_name'] }}</p>
                              </td>
                              <td class="justify-center mt-6">
                                <div class="h-10 w-28">
                                  <div class="relative flex flex-row w-full h-8">
                                    
                                    <form action="{{ route('cartUpdate') }}" method="POST">
                                      @csrf
                                      <input type="hidden" name="id" value="{{ $item['menu_id'] }}" >
                                    <input type="number" name="quantity" min="1" value="{{ $item['quantity'] }}" 
                                    class="w-6 text-center bg-gray-300" />
                                    <button type="submit" class="px-2 pb-2 ml-2 text-white bg-blue-500">update</button>
                                    </form>
                                  </div>
                                </div>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                    RM {{ $item['total_price'] }}
                                </span>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <form action="{{ route('itemRemove') }}" method="POST">
                                  @csrf
                                  <input type="hidden" value="{{ $item['menu_id'] }}" name="id">
                                  <button class="px-4 py-2 text-white bg-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                  </button>
                              </form>
                                
                              </td>
                            </tr>
                            @endforeach
                             
                          </tbody>
                        </table>
                        <div style="margin-bottom: 20px;">
                         <strong>Total: RM {{$finalPrice}}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2" style="margin:0px; padding:0px; display:inline;">
                          <div style="margin:0px; padding:0px; display:inline;">
                            <form action="{{ route('cartClear') }}" method="POST" style="margin:0px; padding:0px; display:inline;">
                              @csrf
                              <button class="px-6 py-2 text-red-80 bg-red-600">Remove All Cart</button>
                            </form>
                          </div>
                          <div style="margin:0px; padding:0px; display:inline;">
                          
                            <form action="{{ route('checkout') }}" method="GET" style="margin:0px; padding:0px; display:inline;">
                              @csrf
                              <button class="px-6 py-2 text-white-80 checkout">Checkout</button>
                            </form>
                          </div>                      
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </main>
        @include('base.footer')
    @include('base.script')
</body>
</html>