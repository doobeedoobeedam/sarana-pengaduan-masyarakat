@extends('templates/dashboard')
@section('content')
        <table class='w-full rounded-lg bg-white divide-y divide-gray overflow-hidden'>
            <thead class="bg-danger">
                <tr class="text-white text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4"> # </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Name </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Designation </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> status </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> role </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray">
                <tr>
                    <td class="px-6 py-4">1</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div>
                                <p> Mira Rodeo </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class=""> Software Developer </p>
                    </td>
                    <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> Active </span> </td>
                    <td class="px-6 py-4 text-center"> Developer </td>
                    <td class="px-6 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline">Ubah</a> </td>
                </tr>
            </tbody>
        </table>
@endsection
