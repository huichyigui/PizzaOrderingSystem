{{-- Author: Gui Hui Chyi --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TapNGo | Admin | Dashboard</title>
    @include('admin.base.a_head')
</head>

<body>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('admin.base.a_header')
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('user.usersidebar')
                    <div class="pcoded-content">
                        <!-- Warning-color Breadcrumb card start -->
                        <div class="card borderless-card" style="margin-bottom: 0px">
                            <div class="card-block warning-breadcrumb">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="{{ url('admin/index') }}">
                                                <i class="icofont icofont-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">{{ $name }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Warning-color Breadcrumb card end -->
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        @forelse ($notifications as $notification)
                                            <div class="alert alert-success mb-2" role="alert">
                                                <div style="float:left">
                                                    <b>[Menu Stockout]</b>
                                                    {{ $notification->data['name'] }} (ID:
                                                    {{ $notification->data['menu_id'] }}) is running out of stock.
                                                    <a class="badge badge-success"
                                                        href="{{ url('admin/manageMenu/edit') }}/{{ Crypt::encrypt($notification->data['menu_id']) }}">
                                                        Add Stock
                                                    </a>
                                                    [{{ date('j \\ F Y, g:i A', strtotime($notification->created_at)) }}]

                                                </div>
                                                <div style="float:right">
                                                    <a href="#" class="float-right mark-as-read"
                                                        data-id="{{ $notification->id }}">
                                                        <b>X</b>
                                                    </a>
                                                </div>
                                                <div style="clear: both"></div>
                                            </div>
                                        @empty
                                            <div class="alert alert-success" role="alert">
                                                There are no new notifications
                                            </div>
                                        @endforelse
                                        <a href="#" class="text-primary pl-2" id="mark-all"><b>Mark all as
                                                read</b></a>

                                    </div>
                                    <div class="row">
                                        {{-- card start --}}
                                        @if (isset($dataIT))
                                            @while ($dataIT->hasCurrent())
                                                @php $data = $dataIT->next() @endphp
                                                <div class="col-md-6 col-xl-3">
                                                    <div class="card widget-card-1">
                                                        <div class="card-block-small">
                                                            <i
                                                                class="icofont {{ $data->icon }} bg-c-blue card1-icon"></i>
                                                            <span class="text-c-blue f-w-600">{{ $data->title }}</span>
                                                            <h4>{{ $data->count }}</h4>
                                                            <div>
                                                                <a href="{{ $data->link }}">View Detail</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endwhile
                                        @endif
                                        <!-- card end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('admin.base.a_script')
    <script>
        function sendMarkRequest(id = null) {
            return $.ajax("{{ route('markNotification') }}", {
                method: 'POST',

                data: {
                    _token: '{{ csrf_token() }}',
                    id
                }
            });
        }
        $(function() {
            $('.mark-as-read').click(function() {
                let request = sendMarkRequest($(this).data('id'));
                request.done(() => {
                    $(this).parents('div.alert').remove();
                });
            });
        });
        $('#mark-all').click(function() {
            let request = sendMarkRequest();
            request.done(() => {
                $('div.alert').remove();
            })
        });
    </script>
</body>

</html>
