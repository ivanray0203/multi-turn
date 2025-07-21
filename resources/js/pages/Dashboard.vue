<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import Markdown from 'vue3-markdown-it';

import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    message: Array
})

console.log(props.message)


const form = useForm({
   messages: props.message,
   content: '',
});

const submit = () => {
  
    form.messages.push({ role: 'user', content: form.content })
    console.log(form.messages)
    form.post(route('dashboard.chat'), {
        preserveState: false,
        preserveScroll: true,
        onSuccess: () => {
            // form.reset()
            // form.message = props.message
        }
    });
}


</script>

<template>
    <Head title="Dashboard" />

    <AppLayout>
        <div class="flex h-full flex-1 flex-col justify-between p-4 gap-4 overflow-hidden">

            <!-- Main Chat Area (Messages would go here) -->
            <div class="flex-1 overflow-y-auto bg-gray-50 rounded-xl p-4">
                <!-- Example messages -->
                 <!-- Chat Messages -->
                <div class="flex-1 overflow-y-auto bg-gray-50 rounded-xl p-4 space-y-2">
                <div
                    v-for="(msg, index) in props.message"
                    :key="index"
                    :class="{
                    'flex justify-end': msg.role === 'user',
                    'flex justify-start': msg.role !== 'user'
                    }"
                >
                    <Markdown
                    :source="msg.content"
                    :class="[
                        'max-w-xs md:max-w-md lg:max-w-lg px-4 py-2 rounded-xl shadow-sm',
                        msg.role === 'user' 
                        ? 'bg-blue-600 text-white rounded-br-none' 
                        : 'bg-gray-200 text-gray-800 rounded-bl-none'
                    ]"
                    />
                </div>
                </div>

            </div>

            <!-- Message Input Form -->
            <form @submit.prevent="submit" class="flex items-center gap-2 border-t pt-4">
                <input
                    ref="messageInput"
                    v-model="form.content"
                    type="text"
                    placeholder="Type a message..."
                    class="flex-1 rounded-full border px-4 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-300"
                />
                <button
                    type="submit"
                    class="rounded-full bg-blue-600 text-white px-4 py-2 text-sm hover:bg-blue-700 transition"
                    :disabled="form.processing"
                >
                    Send
                </button>
            </form>
        </div>
    </AppLayout>
</template>
