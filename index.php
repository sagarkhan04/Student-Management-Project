<?php
session_start();
require 'api/read.php';

$students = getAllStudents();
?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <style>
    body {
        font-family: "Inter", sans-serif;
    }
    </style>
</head>

<body class="h-full">
    <div class="min-h-full flex flex-col">
        <nav class="bg-indigo-600 pb-32">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="text-white font-bold text-xl tracking-tight">STUDENT.IO</span>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <button
                                class="rounded-full bg-indigo-700 p-1 text-indigo-200 hover:text-white focus:outline-none">
                                <span class="sr-only">View notifications</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <header class="py-10">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold tracking-tight text-white">
                        Student List
                    </h1>
                </div>
            </header>
        </nav>

        <main class="-mt-32">
            <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8">
                <div class="rounded-lg bg-white px-5 py-6 shadow sm:px-6">
                    <div class="sm:flex sm:items-center mb-8">
                        <div class="sm:flex-auto">
                            <p class="mt-2 text-sm text-gray-700">
                                A list of all students currently enrolled including their name
                                and email address.
                            </p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a href="create.php"
                                class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Add Student
                            </a>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <?php if (count($students) > 0): ?>
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Name
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Email
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Phone
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Status
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php foreach ($students as $student): ?>
                                <tr>
                                    <td
                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                        <?php echo htmlspecialchars($student['name']); ?>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <?php echo htmlspecialchars($student['email']); ?>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <?php echo htmlspecialchars($student['phone']); ?>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <?php
                                            $statusColor = 'gray';
                                            $statusBgColor = 'bg-gray-50';
                                            $statusTextColor = 'text-gray-700';
                                            $statusRingColor = 'ring-gray-600/20';
                                            
                                            if ($student['status'] === 'Active') {
                                                $statusBgColor = 'bg-green-50';
                                                $statusTextColor = 'text-green-700';
                                                $statusRingColor = 'ring-green-600/20';
                                            } elseif ($student['status'] === 'On Leave') {
                                                $statusBgColor = 'bg-yellow-50';
                                                $statusTextColor = 'text-yellow-800';
                                                $statusRingColor = 'ring-yellow-600/20';
                                            } elseif ($student['status'] === 'Graduated') {
                                                $statusBgColor = 'bg-blue-50';
                                                $statusTextColor = 'text-blue-700';
                                                $statusRingColor = 'ring-blue-600/20';
                                            } elseif ($student['status'] === 'Inactive') {
                                                $statusBgColor = 'bg-red-50';
                                                $statusTextColor = 'text-red-700';
                                                $statusRingColor = 'ring-red-600/20';
                                            }
                                        ?>
                                        <span
                                            class="inline-flex items-center rounded-md <?php echo $statusBgColor; ?> px-2 py-1 text-xs font-medium <?php echo $statusTextColor; ?> ring-1 ring-inset <?php echo $statusRingColor; ?>">
                                            <?php echo htmlspecialchars($student['status']); ?>
                                        </span>
                                    </td>
                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <a href="edit.php?id=<?php echo $student['id']; ?>"
                                            class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
                                        <a href="api/delete.php?id=<?php echo $student['id']; ?>"
                                            class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Are you sure you want to delete <?php echo htmlspecialchars($student['name']); ?>? This action cannot be undone.');">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                        <div class="text-center py-8">
                            <p class="text-sm text-gray-500 mb-4">No students found.</p>
                            <a href="create.php"
                                class="inline-block rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                                Add First Student
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-white border-t border-gray-200 py-6 mt-auto">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <p class="text-center text-sm text-gray-500">
                    &copy; 2025 Student Management System.
                </p>
            </div>
        </footer>
    </div>
</body>

</html>