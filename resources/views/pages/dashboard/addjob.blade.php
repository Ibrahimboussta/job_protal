<x-app-layout>


    @extends('pages.dashboard.naivigation')
    @section('content')

    <div class="w-[80%] p-6">
        <form method="POST" action="{{ route('jobs.store') }}" class="flex flex-col gap-y-6 w-1/2">
            @csrf
            <div class="flex flex-col gap-y-1" >
                <label for="" class="dark:text-white">Job Title</label>
                <input name="title" class="w-full border border-gray-400 rounded dark:bg-gray-800 dark:text-white" type="text" placeholder="Type here">
            </div>


            <div class="flex flex-col gap-y-1 " >
                <label for="" class="dark:text-white">Job description</label>
                <textarea placeholder="Type here" name="description" id="description" rows="3" class="about w-full rounded border border-gray-400 dark:bg-gray-800"></textarea>
            </div>


            <div class="flex gap-x-3">

                <div class="flex flex-col gap-y-1 w-1/3" >
                    <label for="" class="dark:text-white" >Job Category</label>
                    <select name="category" id="" class="w-full border border-gray-400 rounded dark:bg-gray-800 dark:text-white">
                        <option dark value="programming">programming</option>
                        <option dark value="design">design</option>
                        <option value="marketing">marketing</option>
                        <option value="accounting">accounting</option>
                    </select>
                </div>

                <div class="flex flex-col gap-y-1 w-1/3" >
                    <label for="" class="dark:text-white">Job location</label>
                    <select name="location" id="" class="w-full border border-gray-400 rounded dark:bg-gray-800 dark:text-white">
                        <option value="belgium">belgium</option>
                        <option value="morocco">morocco</option>
                        <option value="united states">united states</option>
                        <option value="egypt">egypt</option>
                    </select>
                </div>

                <div class="flex flex-col gap-y-1 w-1/3" >
                    <label for="" class="dark:text-white">Job Level</label>
                    <select name="levels" id="" class="w-full border border-gray-400 rounded dark:bg-gray-800 dark:text-white">
                        <option value="junior">junior</option>
                        <option value="mid-senior">mid-senior</option>
                        <option value="senior">senior</option>
                    </select>
                </div>

            </div>


            <div class="flex flex-col gap-y-1 w-1/4">
                <label for="" class="dark:text-white">Job Salary</label>
                <input name="salary" class="w-full border border-gray-400 rounded dark:bg-gray-800" type="number">
            </div>


            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-lg w-[20%] dark:bg-gray-300 dark:text-gray-800">Add</button>

        </form>
    </div>


    @endsection



</x-app-layout>
