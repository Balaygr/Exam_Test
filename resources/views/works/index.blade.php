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
                    <div id="work-count"></div>
                    <div class="container">
                    <div class="row">
                        <div class="col-2 col-sm-3"><a class="bg-green-500 inline-flex items-center justify-center rounded-md py-2 px-6 text-center
                            text-base font-normal text-white hover: bg-opacity-90 lg:px-8 xl:px-10" href="/works/create">เพิ่มงาน</a></div>
                            <form method="get" action="{{ route('works.index') }}">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" name="search" class="form-control" placeholder="ค้นหา" value="{{ request()->input('search') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" name="date_start" class="form-control" value="{{ request()->input('date_start') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" name="date_end" class="form-control" value="{{ request()->input('date_end') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="bg-blue-500 inline-flex items-center justify-center rounded-md py-2 px-6 text-center
                                        text-base font-normal text-white hover: bg-opacity-90 lg:px-8 xl:px-10">ค้นหา</button>
                                    </div>
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
                                <th>สร้างเมื่อ</th>
                                <th>อัพเดทล่าสุด</th>
                                <th></th>
                                <th></th>
                                <td></td>
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
                                {{$work->created_at}}
                            </td>
                            <td>
                                {{$work->updated_at}}
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

<script>
    var works = @json($works);
    document.getElementById('work-count').textContent = 'รายงานทั้งหมด : ' + works.length;
</script>