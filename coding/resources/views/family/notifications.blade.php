@extends('family.layouts.app')

@section('title', 'الإشعارات')

@section('content')

    <div class="container">

        <div class="d-flex justify-content-between mb-3 mt-4">
           <div>
               <h2 class="title mt-3"><i class="fas fa-bell"></i> الإشعارات</h2>
           </div>
         <div>
             <form action="{{ route('family.notifications.readAll') }}" method="POST" class="d-inline">
                 @csrf
                 <button type="submit" class="btn btn-success btn-sm">
                     <i class="fas fa-check-circle"></i> تحديد الكل كمقروء
                 </button>
             </form>

             <form action="{{ route('family.notifications.deleteAll') }}" method="POST" class="d-inline">
                 @csrf
                 <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف جميع الإشعارات؟')">
                     <i class="fas fa-trash"></i> حذف الكل
                 </button>
             </form>
         </div>
        </div>

        @if($notifications->isEmpty())
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> لا يوجد إشعارات حالياً.
            </div>
        @else
            <div class="row">
                @foreach($notifications as $notification)
                    <div class="col-md-12">
                        <div class="card shadow-sm mb-3 {{ !$notification->is_read ? 'bg-light' : 'bg-white' }}">
                            <div class="card-body d-flex align-items-center">
                                <div class="me-3">
                                    <i class="fas {{ getNotificationIcon($notification->type) }} fa-2x text-primary"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-1">{{ $notification->type }}</h5>
                                    @if($notification->type == "تقرير جديد")
                                        <a href="{{ route('family.reports') }}" class="text-primary">عرض التقرير</a>
                                    @else
                                        {{ $notification->message }}
                                    @endif
{{--                                    <p class="card-text text-muted mb-0">{{ $notification->message }}</p>--}}
                                </div>
                                <div class="text-end">
                                    <small class="text-muted">{{ date('Y-m-d h:i A', strtotime($notification->created_at)) }}</small>

                                    <form action="{{ route('family.notifications.read', $notification->notification_id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm" {{ $notification->is_read ? 'disabled' : '' }}>
                                            <i class="fas fa-check"></i> مقروء
                                        </button>
                                    </form>

                                    <form action="{{ route('family.notifications.delete', $notification->notification_id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف هذا الإشعار؟')">
                                            <i class="fas fa-trash"></i> حذف
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

@endsection
