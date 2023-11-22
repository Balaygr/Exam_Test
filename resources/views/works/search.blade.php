<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            การปฏิบัติงาน
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                    <div class="row">
                        <div class="col-2 col-sm-3"><a class="bg-green-500 inline-flex items-center justify-center rounded-md py-2 px-6 text-center
                            text-base font-normal text-white hover: bg-opacity-90 lg:px-8 xl:px-10" href="/works/create">เพิ่มงาน</a></div>
                        <form action="/works/search" method="GET">
                            <div class="col-2 col-sm-3">
                                <label >เริ่ม</label>
                                <input type="date" name="date_start" class="border-form-stroke text-body-color placeholder-body-color focus:border-primary
                                active:border-primary rounded-lg border-[1.5px] py-3 px-5 font-medium outline-none
                                transition disabled:cursor-default disabled:bg-[#F5F7FD]"/>
                            </div>
                            <div class="col-6 col-sm-3">
                                <label >เสร็จ</label>
                                <input type="date" name="date_end" class="border-form-stroke text-body-color placeholder-body-color focus:border-primary
                                active:border-primary rounded-lg border-[1.5px] py-3 px-5 font-medium outline-none
                                transition disabled:cursor-default disabled:bg-[#F5F7FD]"/>
                            </div>
                            <div class="col-md-1 px-4">
                                <button type="submit" class="bg-green-500 inline-flex items-center justify-center rounded-md py-2 px-6 text-center
                                text-base font-normal text-white hover: bg-opacity-90 lg:px-8 xl:px-10">กรอง</button>
                            </div>
                        </form>
                    </div>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    ประเภทของงาน
                                </th>
                                <th>
                                    ชื่องาน / โครงการ
                                </th>
                                <th>
                                    เวลาเริ่มงาน
                                </th>
                                <th>เวลาเสร็จงาน</th>
                                <th>สถานะงาน</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach ($works as $work)
                        <tbody>
                            <td>
                                {{$work->type_work}}
                            </td>
                            <td>
                                {{$work->name_work}}
                            </td>
                            <td>
                                {{$work->time_start}}
                            </td>
                            <td>
                                {{$work->time_end}}
                            </td>
                            <td>
                                {{$work->status}}
                            </td>
                            <td>
                                <span class="ml-4 border border-orange-500 bg-orange-200 px-2 inline-block"><a href="/works/{{$work->id}}">ดูข้อมูล</a></span>
                            </td>
                            <td>
                                <span class="ml-4 border border-orange-500 bg-orange-200 px-2 inline-block"><a href="/works/{{$work->id}}/edit">แก้ไข</a></span>
                            </td>
                            <td>
                                <form action="/works/{{$work->id}}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="ml-4 border border-red-500 bg-red-200 px-2" type="submit">ลบข้อมูล</button>
                                </form>
                            </td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
