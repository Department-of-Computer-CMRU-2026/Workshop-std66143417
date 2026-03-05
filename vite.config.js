<<<<<<< HEAD
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import os from 'os';

// ฟังก์ชันหา IP address ของเครื่องอัตโนมัติ
function getLocalIPAddress() {
    const interfaces = os.networkInterfaces();
    for (const name of Object.keys(interfaces)) {
        for (const iface of interfaces[name]) {
            // ข้าม internal (127.0.0.1) และ non-IPv4 addresses
            if (iface.family === 'IPv4' && !iface.internal) {
                return iface.address;
            }
        }
    }
    return 'localhost';
}

const localIP = getLocalIPAddress();
console.log('🚀 Vite HMR running on:', localIP);
=======
import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from "@tailwindcss/vite";
>>>>>>> 1df37db256d9068ed25ea4a04075fa430c840c6b

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
<<<<<<< HEAD
        host: '0.0.0.0',
        port: 5173,
        strictPort: true,
        cors: {
            origin: '*',
            methods: ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
            allowedHeaders: ['Content-Type', 'Authorization'],
        },
        hmr: {
            host: localIP, // หา IP อัตโนมัติจาก network interface
            port: 5173,
        },
    },
});
=======
        cors: true,
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
>>>>>>> 1df37db256d9068ed25ea4a04075fa430c840c6b
