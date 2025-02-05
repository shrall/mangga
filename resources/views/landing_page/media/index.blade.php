@extends('layouts.home')
@section('content')
    <div class="grid grid-cols-10 gap-x-8 mx-8 md:mx-16 mb-4">
        <div class="col-span-2 hidden xl:block"></div>
        <div
            class="col-span-10 xl:col-span-8 text-4xl py-4 border-b border-gray-400 font-semibold flex justify-between xl:block">
            Media<div class="text-2xl bg-mangga-green-400 p-2 xl:hidden" id="filter-button-mobile"
                onclick="toggleMobileMediaFilter();">
                <span class="fa fa-filter text-white"></span>
            </div>
            <ul class="absolute text-black pt-1 px-4 mt-16 right-16 bg-white shadow-xl text-xl hidden xl:hidden"
                id="filter-menu-mobile">
                <li class="flex items-center justify-between" onclick="changeMediaFilterMobile(1);">
                    <a
                        class="rounded-t bg-white hover:bg-gray-100 py-2 block whitespace-no-wrap cursor-pointer">Pengumuman</a>
                    <span class="fa fa-bullhorn ml-2"></span>
                </li>
                <li class="flex items-center justify-between" onclick="changeMediaFilterMobile(2);">
                    <a class="rounded-t bg-white hover:bg-gray-100 py-2 block whitespace-no-wrap cursor-pointer">Galeri</a>
                    <span class="fa fa-images ml-2"></span>
                </li>
                <li class="flex items-center justify-between" onclick="changeMediaFilterMobile(3);">
                    <a class="rounded-t bg-white hover:bg-gray-100 py-2 block whitespace-no-wrap cursor-pointer">Artikel</a>
                    <span class="fa fa-newspaper ml-2"></span>
                </li>
                <li class="flex items-center justify-between" onclick="changeMediaFilterMobile(4);">
                    <a
                        class="rounded-t bg-white hover:bg-gray-100 py-2 block whitespace-no-wrap cursor-pointer">Penghargaan</a>
                    <span class="fa fa-award ml-2"></span>
                </li>
            </ul>
        </div>
        <div class="col-span-2 card hidden xl:block">
            <div class="flex items-center justify-between px-8 py-6 border-b border-gray-400 text-2xl">Filter <span
                    class="fa fa-fw fa-filter text-gray-400"></span></div>
            <div class="flex flex-col gap-y-6 p-8 text-xl">
                <div class="cursor-pointer bg-mangga-green-400 text-white rounded-lg p-3 media-menu text-lg 2xl:text-xl"
                    id="media-1" onclick="changeMediaFilter(1);">
                    <span class="fa fa-fw fa-bullhorn mr-2"></span>Pengumuman
                </div>
                <div class="cursor-pointer hover:bg-mangga-green-400 hover:text-white rounded-lg p-3 media-menu text-lg 2xl:text-xl"
                    id="media-2" onclick="changeMediaFilter(2);">
                    <span class="fa fa-fw fa-images mr-2"></span>Galeri
                </div>
                <div class="cursor-pointer hover:bg-mangga-green-400 hover:text-white rounded-lg p-3 media-menu text-lg 2xl:text-xl"
                    id="media-3" onclick="changeMediaFilter(3);">
                    <span class="fa fa-fw fa-newspaper mr-2"></span>Artikel
                </div>
                <div class="cursor-pointer hover:bg-mangga-green-400 hover:text-white rounded-lg p-3 media-menu text-lg 2xl:text-xl"
                    id="media-4" onclick="changeMediaFilter(4);">
                    <span class="fa fa-fw fa-award mr-2"></span>Penghargaan
                </div>
            </div>
        </div>
        <div class="col-span-10 xl:col-span-8 flex flex-col gap-y-4 py-4" id="media-div">
            @include('landing_page.inc.media')
        </div>
        <div class="col-span-2 hidden xl:block"></div>
        <div class="col-span-10 xl:col-span-8"></div>
    </div>
@endsection

@section('scripts')
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function changeMediaFilter(type) {
            $('.media-menu').removeClass('bg-mangga-green-400').removeClass('text-white').addClass(
                'hover:bg-mangga-green-400').addClass('hover:text-white');
            $('#media-' + type).addClass('bg-mangga-green-400').addClass('text-white').removeClass(
                'hover:bg-mangga-green-400').removeClass('hover:text-white');
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.post(url + "/media/fetch_data", {
                    _token: CSRF_TOKEN,
                    data: type,
                })
                .done(function(data) {
                    $('#media-div').html(data);
                })
                .fail(function(error) {
                    console.log(error);
                });
        }

        function toggleMobileMediaFilter() {
            $('#filter-menu-mobile').removeClass('hidden').addClass('block');
        }

        function changeMediaFilterMobile(type) {
            $('#filter-menu-mobile').removeClass('block').addClass('hidden');
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.post(url + "/media/fetch_data", {
                    _token: CSRF_TOKEN,
                    data: type,
                })
                .done(function(data) {
                    $('#media-div').html(data);
                })
                .fail(function(error) {
                    console.log(error);
                });
        }
    </script>
@endsection
