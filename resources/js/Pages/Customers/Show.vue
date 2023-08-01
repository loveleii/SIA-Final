<template>
    <Head title="View Customer" />

    <AppLayout>
      <template #header>
        <div class="flex items-center justify-between">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">View Customer</h2>
          <div class="flex space-x-4">
            <Link :href="'/customers/email/' + customer.id" class="back-button text-white">Send Email</Link>
            <Link class="back-button text-white" as="button" :href="'/customers/'">Back</Link>
          </div>
        </div>
      </template>

      <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="bg-green-200 overflow-hidden shadow-sm rounded-lg">
            <div class="p-6">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="w-full md:h-[500px] border rounded-lg overflow-hidden shadow-md hover:bg-gray-800">
                  <img :src="props.customer.pic_url" alt="Customer Image" class="object-cover w-full h-full">
                </div>
                <div class="flex flex-col space-y-4">
                  <div class="text-2xl font-semibold text-green-800">{{ customer.name }}</div>
                  <hr class="border-gray-400">
                  <div>
                    <div class="text-gray-600">Location:</div>
                    <div class="mt-2">{{ customer.location }}</div>
                  </div>
                  <div>
                    <div class="text-gray-600">Phone Number:</div>
                    <div class="mt-2">{{ customer.phone }}</div>
                  </div>
                  <div>
                    <div class="text-gray-600">Stylist:</div>
                    <div class="mt-2">{{ customer.stylist }}</div>
                  </div>
                  <div>
                    <div class="text-gray-600">Price:</div>
                    <div class="mt-2">{{ customer.price }}</div>
                  </div>
                  <div>
                    <div class="text-gray-600">Date:</div>
                    <div class="mt-2">{{ customer.formattedADate }}</div>
                  </div>

                  <div class="mt-auto flex justify-end">
                    <div class="space-x-2">
                      <Link v-if="props.auth.user.roles.includes('admin')" class="button13 mr-2" :href="'/customers/' + customer.id" method="delete" as="button">Delete</Link>
                      <Link v-if="props.auth.user.roles.includes('admin')" class="button12 mb-2" :href="'/customers/edit/' + customer.id" as="button">Edit</Link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </AppLayout>
  </template>

  <script setup>
  import AppLayout from '@/Layouts/AppLayout.vue';
  import { Head, Link, usePage } from '@inertiajs/vue3';
  import { computed } from 'vue';

  const props = defineProps({
    customer: Object,
    auth: Object,
  });

  const page = usePage();
  const user = computed(() => page.props.auth.user);
  </script>

  <style>


  .bg-green-50 {
    background-color: #f0fff4;
  }

  .text-green-800 {
    color: #38a169;
  }

  .hover\:bg-green-100:hover {
    background-color: #c6f6d5;
  }

  .back-button {
    background-color: #30a72c;
    padding: 15px;
    border-radius: 5px;
  }

  .back-button:hover {
    background-color: #1d721a;
  }

  .button12,
.button13 {
  background-color: #187714;
  padding: 10px;
  color: white;
  transition: background-color 0.2s ease-in-out;
  border-radius: 4px;
  cursor: pointer;
}

/* Add hover effect to the buttons */
.button12:hover {
  background-color: #043a0d;
}

.button13:hover {
  background-color: #3a0404;
}
  </style>
