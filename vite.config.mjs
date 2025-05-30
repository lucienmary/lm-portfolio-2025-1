import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";
import path from "path";

export default defineConfig({
  // on reste à la racine du projet :
  root: path.resolve(__dirname),

  // sert “public/” comme dossier statique (images, .htaccess…)
  publicDir: "public",
  plugins: [tailwindcss()],
  server: {
    port: 5173,
    strictPort: true,
    // (optionnel) proxy si tu veux ouvrir tes .php sur le port 5173
    proxy: {
      '^/.*\\.php($|\\?)': {
        target: "http://localhost:8000",
        changeOrigin: true,
        secure: false,
      },
    },
  },

  build: {
    // en prod, bundle dans public/dist
    outDir: "dist",
    emptyOutDir: false,
    manifest: true,
    rollupOptions: {
      // point d’entrée JS/TS
      input: path.resolve(__dirname, "src/main.js"),
    },
  },
});
