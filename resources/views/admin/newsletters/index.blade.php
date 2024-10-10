@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Newsletter Subscribers</h1>

        <div class="flex justify-end mb-4">
            <button onclick="copyEmails()" class="bg-orange-500 text-white px-6 py-2 rounded hover:bg-orange-600">
                Copy Emails
            </button>
        </div>

        <table class="w-full bg-gray-800 text-white rounded-lg">
            <thead>
            <tr class="bg-gray-700">
                <th class="p-4 text-left">Email</th>
                <th class="p-4 text-left">Subscribed At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($newsletters as $newsletter)
                <tr class="border-t border-gray-700">
                    <td class="p-4">{{ $newsletter->email }}</td>
                    <td class="p-4">{{ $newsletter->created_at->format('M d, Y') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <textarea id="emailList" class="hidden">@foreach($newsletters as $newsletter){{ $newsletter->email }}, @endforeach</textarea>

    </div>

    <script>
        function copyEmails() {
            const emailList = document.getElementById('emailList');
            emailList.select();
            document.execCommand('copy');
            alert('Emails copied to clipboard!');
        }
    </script>
@endsection
