<div>
    <div class="container py-4 mx-auto">
        <div class="flex items-center justify-between py-8">
            <h1 class="text-2xl font-bold">Jobs</h1>
        </div>
        <div class="w-full">
            <!-- Start coding here -->
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Title</th>
                                <th scope="col" class="px-4 py-3">Description</th>
                                <th scope="col" class="px-4 py-3">Company Logo</th>
                                <th scope="col" class="px-4 py-3">Company Name</th>
                                <th scope="col" class="px-4 py-3">Experience</th>
                                <th scope="col" class="px-4 py-3">Salary</th>
                                <th scope="col" class="px-4 py-3">Location</th>
                                <th scope="col" class="px-4 py-3">Skills</th>
                                <th scope="col" class="px-4 py-3">Extra</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 font-semibold text-gray-900 whitespace-nowrap dark:text-white">{{ $job['title'] }}</th>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ str($job['description'])->words(7) }}</td>
                                    <td class="px-4 py-3 text-center">
                                        <img
                                            src="{{ ($job['company_logo'] != '') ? asset('storage/' . $job['company_logo'])  : '/logo.svg' }}"
                                            alt="{{ $job['company_name'] ?? 'Company Logo' }}"
                                            class="block w-auto h-12 mx-auto"
                                            loading="lazy"
                                            height="48"
                                            @if(!isset($job['company_logo'])) width="120" @endif
                                        >
                                    </td>
                                    <td><span class="font-medium text-gray-900">{{ $job['company_name'] }}</span></td>
                                    <td class="px-4 py-3">{{ $job['experience'] }}</td>
                                    <td class="px-4 py-3">{{ $job['salary_range'] }}</td>
                                    <td class="px-4 py-3">{{ $job['location'] }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex flex-wrap items-center gap-2">
                                            @php $technologies = json_decode($job['technologies']) ?? []; @endphp
                                            @foreach ($technologies as $skill)
                                                <span class="inline-block bg-gray-200 rounded-full px-2 py-0.5 text-xs font-medium text-gray-700">{{ $skill->name }}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex flex-wrap items-center gap-2">
                                            @php $tags = explode(',', $job['tags'] ?? '');@endphp
                                            @foreach ($tags as $extra)
                                                <span class="inline-block bg-amber-100 rounded-full px-2 py-0.5 text-xs font-medium text-amber-800">{{ $extra }}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="flex items-center justify-end px-4 py-3">
                                        <button wire:click="deleteJob({{ $job['id'] }})" class="text-sm px-3 py-1.5 rounded hover:bg-slate-100 transition-colors text-red-500">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
