<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            เพิ่มบันทึกประจำวัน
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="/works/{{$work->id}}" class="w-full px-4 md:w-1/2 lg:w-1/3">
                        @method('PUT')
                        @csrf
                        <div class="mb-6">
                            <label for="name_work" class="mb-3 block text base fot-medium text-black">
                                ประเภทของงาน:
                            </label>
                            <select name="type_work">
                            <option value="Development">Development </option>
                            <option value="Test">Test </option>
                            <option value="Document">Document </option>
                            </select>
                            <label for="name_work" class="mb-3 block text base fot-medium text-black">
                                ชื่องาน:
                            </label>
                            <input name="name_work" value="{{$work->name_work}}" type="text" placeholder="ชื่อของงาน" 
                            class="border-form-stroke text-body-color placeholder-body-color focus:border-primary
                            active:border-primary w-full rounded-lg border-[1.5px] py-3 px-5 font-medium outline-none
                            transition disabled:cursor-default disabled:bg-[#F5F7FD]"/>

                            <label for="title" class="mb-3 block text base fot-medium text-black">
                                เวลาที่เริ่ม:
                            </label>
                            <input name="time_start" value="{{$work->time_start}}" type="datetime-local" 
                            class="border-form-stroke text-body-color placeholder-body-color focus:border-primary
                            active:border-primary w-full rounded-lg border-[1.5px] py-3 px-5 font-medium outline-none
                            transition disabled:cursor-default disabled:bg-[#F5F7FD]"/>

                            <label for="title" class="mb-3 block text base fot-medium text-black">
                                เวลาที่งานเสร็จ:
                            </label>
                            <input name="time_end" value="{{$work->time_end}}" type="datetime-local" 
                            class="border-form-stroke text-body-color placeholder-body-color focus:border-primary
                            active:border-primary w-full rounded-lg border-[1.5px] py-3 px-5 font-medium outline-none
                            transition disabled:cursor-default disabled:bg-[#F5F7FD]"/>

                            <label for="name_work" class="mb-3 block text base fot-medium text-black">
                                สถานะของงาน:
                            </label>
                            <select name="status">
                            <option value="ดำเนินการ">ดำเนินการ </option>
                            <option value="เสร็จสิ้น">เสร็จสิ้น </option>
                            <option value="ยกเลิก">ยกเลิก </option>
                            </select>

                        </div>
                        <button type="submit" class="bg-green-500 inline-flex items-center justify-center rounded-md py-2 px-6 text-center
                        text-base font-normal text-white hover: bg-opacity-90 lg:px-8 xl:px-10">
                            เพิ่มบันทึก
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
