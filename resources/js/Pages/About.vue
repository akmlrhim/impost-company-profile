<script setup>
import { ref } from "vue";
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Reveal from "@/Components/Motion/Reveal.vue";

const sekilas = [
  "Setiap bisnis punya cerita dan perjalanannya masing-masing. Kami di CV Impost Media Indonesia, atau yang lebih akrab disapa Impost Media, percaya bahwa langkah pertama yang paling penting untuk membangun sebuah brand bukanlah langsung berbicara, melainkan mendengarkan.",
  "Berpusat di Banjarbaru, Kalimantan Selatan, kami hadir sebagai All-in-One Integrated Digital Marketing Agency sekaligus perusahaan multiservice. Kami mendampingi Anda untuk merapikan makna bisnis dengan mencari tahu siapa Anda sebenarnya, untuk siapa Anda hadir, dan kesan apa yang ingin Anda tinggalkan di hati audiens saat mereka berinteraksi dengan Anda.",
  "Dari pemahaman mendalam itulah, kami mulai merangkai cerita. Kami sangat mengedepankan pemasaran berbasis konten dan storytelling untuk membangun narasi inti yang konsisten di semua ruang, mulai dari website, media sosial, hingga komunikasi sehari-hari. Tujuan kami sederhana, yaitu memastikan suara perusahaan Anda terdengar jernih, membangun identitas merek yang kuat, dan meningkatkan visibilitas Anda secara natural.",
  "Semangat kami berakar pada satu keyakinan fundamental: Insight to Impact. Perjalanan kami yang berawal dari dunia kreasi konten mengajarkan satu pelajaran penting, bahwa cerita yang indah harus mampu membawa perubahan yang terukur. Karena itu, setiap strategi pemasaran dan iklan digital yang kami buat mengusung pendekatan performance-based advertising. Kami tidak suka menebak-nebak. Setiap kampanye dirancang agar efisien, berorientasi pada konversi, dan memberikan hasil yang nyata.",
  "Kami mendedikasikan diri untuk menjadi rekan kerja yang mengedepankan transparansi dan akuntabilitas. Sebagai bukti komitmen terhadap pertumbuhan omzet Anda, kami bahkan memberikan jaminan uang kembali (money-back guarantee) pada layanan kampanye kami.",
  "Lebih dari sekadar pemasaran digital, Impost Media juga siap mendukung berbagai kebutuhan bisnis Anda melalui layanan event organizer, hiburan profesional, hingga pengadaan barang dan jasa. Pada akhirnya, ini bukanlah sekadar tentang kehadiran Anda di ranah digital atau kesuksesan sebuah acara. Ini adalah komitmen kami untuk menjadi mitra tepercaya yang membantu Anda mengefisienkan biaya, mendorong pertumbuhan yang berkelanjutan, dan merawat ikatan yang hangat dengan pelanggan Anda di seluruh Indonesia.",
];

const perjalanan = [
  {
    tab: "One Direction",
    title: "One Direction",
    body: "Impost Media lahir dari satu arah yang jelas. Bukan untuk sekadar hadir di ruang digital, tetapi untuk membantu mengarahkan pertumbuhan bisnis dengan tujuan yang terstruktur dan terukur. Di tengah dunia digital marketing yang sering bergerak reaktif, kami memilih satu kompas di dalam satu atap: pertumbuhan yang dibentuk. Setiap analisis, strategi, eksekusi, dan keputusan tidak berjalan sendiri. Semuanya bergerak menuju akhir tujuan yang sama. Satu arah ini membuat kami terfokus, tidak mudah tergoda dengan tren sesaat, tidak terpecah oleh vanity metriks semata. Karena bagi kami, digital marketing bernilai ketika ia mampu mendorong bisnis untuk melangkah lebih jauh.",
  },
  {
    tab: "Built as a System",
    title: "Built as a System",
    body: "Impost Media tidak dibangun sebagai individu. Ia dibangun sebagai sebuah sistem. Sistem yang menjadi sebuah alat untuk menghubungkan riset, hasil analisis, strategi, eksekusi, distribusi, dan evaluasi dalam satu alur kerja yang rapi dan terstruktur. Setiap perjalanannya saling menopang, memastikan pertumbuhannya tidak bergantung pada momentum, tetapi pada fondasi. Melalui pendekatan seperti sistem ini membuat kami mampu bekerja secara efisien; menghemat waktu, menekan biaya yang tidak perlu, dan meminimalisir trial-error yang sering menghambat dan membebani bisnis.",
  },
  {
    tab: "Consistent",
    title: "Consistent Positioning",
    body: "Kami percaya, brand yang kuat tidak dibangun dari konten yang ramai, tetapi dari posisi yang konsisten. Impost Media mengembangkan positioning framework yang menjaga brand tetap berada pada jalurnya, jelas dalam pesan, relevan dengan market, dan konsisten di setiap channelnya. Dengan fondasi seperti ini, setiap strategi dan komunikasi memiliki arah. Setiap output yang dihasilkan mampu memperkuat persepsi, dan setiap campaign berperan besar dalam satu kesatuan aktivitas.",
  },
  {
    tab: "Data-Driven",
    title: "Data-Driven Approach",
    body: "Setiap keputusan yang kami ambil berangkat dari data, bukan asumsi semata atupun intuisi sesaat. Kami menggunakan data untuk membaca perilaku market, mengukur performa, dan menyempurnakannya menjadi strategi secara berkelanjutan. Pendekatan seperti ini membuktikan setiap langkah dapat dipertanggungjawabkan dan setiap hasil dapat dipantau berkala. Bagi kami, data bukan sekadar angka. Ia adalah bahasa bisnis yang menjadi jembatan strategi dengan impact yang nyata.",
  },
  {
    tab: "Expert Partner",
    title: "Your Expert Partner",
    body: "Kami bukan sekadar pembuat konten. Kami hadir sebagai partner ahli. Tim Impost Media memiliki praktisi berpengalaman yang memahami bisnis, bukan hanya sekadar pengisi channel. Kami bekerja fleksibel, adaptif, dan kolaboratif dengan menyesuaikan strategi dengan fase pertumbuhan bisnis yang dikelola. Bahkan dalam skema kerja tertentu, hasil menjadi dasar dari kolaborasi. Karena kepercayaan kami pada sistem yang dibangun cukup kuat untuk berbagi risiko, bukan sekadar menagih jasa.",
  },
  {
    tab: "Insight to Impact",
    title: "Insight to Impact",
    body: "Pada akhirnya, semua bermuara pada dampak. Insight kami olah menjadi strategi. Strategi diterjemahkan menjadi aksi. Dan aksi kami ukur melalui pertumbuhan bisnis yang nyata. Insight to Impact. Proses terstruktur yang mengubah pemahaman menjadi hasil. Impost Media berdiri untuk bisnis, property, pertambangan, enterprise, hingga holding company yang tidak hanya ingin terlihat berkembang. Dengan All In One-Integrated Services dan 360 Marketing, kami akan membawanya benar-benar bertumbuh dengan arah yang jelas, sistem yang kuat dan terstruktur, dan dampak yang berkelanjutan.",
  },
];

const misi = [
  {
    icon: "analytics",
    text: "Memberikan layanan digital marketing berbasis data yang membantu brand tumbuh, dikenal luas, dan meningkatkan konversi secara nyata.",
  },
  {
    icon: "event",
    text: "Menyediakan solusi event organizer, hiburan profesional, hingga music performance & production untuk mendukung berbagai kebutuhan klien.",
  },
  {
    icon: "procurement",
    text: "Mendukung kebutuhan acara dan instansi melalui layanan pengadaan barang dan jasa, seperti katering, alat tulis kantor, serta perlengkapan pendukung lainnya dengan kualitas yang terjamin dan tepat guna.",
  },
];

const isVideoPlaying = ref(false);
const activeStep = ref(0);
</script>

<template>
  <HomeLayout title="Tentang Kami">
    <!-- Lead -->
    <Reveal as="section" class="mx-auto max-w-7xl px-4 pb-16 pt-14 sm:px-6 lg:px-8">
      <nav class="flex flex-wrap items-center gap-2 text-sm text-impost-third" aria-label="Breadcrumb">
        <Link :href="route('home')" class="transition-colors hover:text-ink">Beranda</Link>
        <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
        </svg>
        <span class="font-bold text-ink">Tentang</span>
      </nav>

      <h1 class="mt-10 max-w-4xl text-2xl font-bold leading-snug sm:text-3xl lg:text-4xl">
        Impost Media adalah All-in-One Integrated Digital Marketing Agency sekaligus perusahaan multiservice yang
        membantu bisnis Indonesia bertumbuh dengan arah yang jelas, sistem yang kuat, dan dampak yang berkelanjutan.
      </h1>
    </Reveal>

    <!-- Video Profil -->
    <section class="mx-auto max-w-7xl px-4 pb-16 sm:px-6 lg:px-8">
      <Reveal>
        <div class="relative aspect-video overflow-hidden rounded-3xl border border-line bg-black">
          <button v-if="!isVideoPlaying" type="button" class="group absolute inset-0 flex items-center justify-center"
            aria-label="Putar video profil Impost Media" @click="isVideoPlaying = true">
            <span
              class="flex size-16 items-center justify-center rounded-full bg-white/10 ring-1 ring-white/30 transition group-hover:bg-impost-primary group-hover:ring-impost-primary">
              <svg class="ml-1 size-6 text-white" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M8 5v14l11-7z" />
              </svg>
            </span>
          </button>
          <iframe v-else class="absolute inset-0 h-full w-full"
            src="https://www.youtube.com/embed/1uCsuKPyWo4?si=eEz4eHM3kuqrGV3r&autoplay=1"
            title="Video profil Impost Media" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen />
        </div>
      </Reveal>
    </section>

    <!-- Sekilas -->
    <section>
      <Reveal class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24" :delay="0.05">
        <div class="min-w-0 space-y-5">
          <p v-for="(paragraph, index) in sekilas" :key="index"
            class="max-w-4xl text-sm leading-relaxed text-ink lg:text-base">
            {{ paragraph }}
          </p>
        </div>
      </Reveal>
    </section>

    <!-- Brand History -->
    <section class="relative overflow-hidden bg-impost-fifth">
      <img src="/img/brand_history.webp" alt="" aria-hidden="true" loading="lazy"
        class="absolute inset-0 size-full object-cover">
      <div class="absolute inset-0 bg-gradient-to-b from-impost-fifth via-impost-fifth/85 to-transparent" aria-hidden="true" />
      <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-impost-fifth via-impost-fifth/80 to-transparent" aria-hidden="true" />

      <div class="relative mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
        <Reveal>
          <h2 class="text-3xl font-bold text-white sm:text-4xl lg:text-5xl">Brand History</h2>
          <p class="mt-4 max-w-4xl text-base leading-relaxed text-white lg:text-lg">
            Sebuah perjalanan dari menetapkan arah hingga menciptakan dampak nyata.
          </p>
        </Reveal>

        <Reveal :delay="0.05">
          <div class="mt-14 flex overflow-x-auto pb-2 sm:grid sm:grid-cols-3 lg:grid-cols-6" role="tablist"
            aria-label="Perjalanan Impost Media">
            <button v-for="(item, index) in perjalanan" :id="`history-tab-${index}`" :key="item.tab" type="button"
              role="tab" :aria-selected="activeStep === index" :aria-controls="`history-panel`"
              class="group flex w-44 flex-none flex-col items-center pt-2 text-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary focus-visible:ring-offset-4 focus-visible:ring-offset-impost-fifth sm:w-auto"
              @click="activeStep = index">
              <span class="text-sm font-bold transition-colors lg:text-base"
                :class="activeStep === index ? 'text-impost-primary' : 'text-white'">
                {{ item.tab }}
              </span>
              <span class="mt-3 block h-px w-full transition-colors"
                :class="index <= activeStep ? 'bg-impost-primary' : 'bg-white/20'" aria-hidden="true" />
              <span class="mx-auto mt-3 block size-3 rounded-full transition-colors"
                :class="activeStep === index ? 'bg-impost-primary' : 'bg-white/25 group-hover:bg-white/50'"
                aria-hidden="true" />
            </button>
          </div>

          <!-- Semua panel ditumpuk di satu sel grid: tinggi section
                         selalu setinggi panel terpanjang, sehingga background
                         tidak bergeser saat pindah stepper. -->
          <div id="history-panel" class="mt-12 grid" role="tabpanel" :aria-labelledby="`history-tab-${activeStep}`">
            <article v-for="(item, index) in perjalanan" :key="item.title"
              class="[grid-area:1/1] max-w-4xl transition duration-300 motion-reduce:transition-none" :class="index === activeStep
                ? 'translate-y-0 opacity-100'
                : 'invisible pointer-events-none translate-y-2 opacity-0 motion-reduce:transform-none'">
              <h3 class="text-xl font-bold text-white lg:text-2xl">
                {{ item.title }}
              </h3>
              <p class="mt-5 text-justify text-sm leading-relaxed text-white lg:text-base">
                {{ item.body }}
              </p>
            </article>
          </div>
        </Reveal>
      </div>
    </section>

    <!-- Visi -->
    <section class="bg-impost-fifth">
      <Reveal class="mx-auto max-w-7xl px-4 pt-16 pb-12 sm:px-6 lg:px-8 lg:pt-24 lg:pb-16">
        <h2 class="text-sm font-bold uppercase text-impost-primary lg:text-base">Visi</h2>

        <p class="mt-6 max-w-4xl text-3xl font-bold leading-tight text-white sm:text-4xl lg:text-5xl">
          Menjadi Mitra Multiservice <span class="text-impost-primary">Terpercaya</span>
        </p>
        <p class="mt-6 max-w-4xl text-sm leading-relaxed text-white lg:text-base">
          Menjadi mitra multiservice terpercaya di Indonesia melalui layanan bisnis, event, dan pengadaan
          yang profesional serta berorientasi pada hasil.
        </p>
      </Reveal>
    </section>

    <!-- Misi -->
    <section class="bg-impost-fifth">
      <Reveal class="mx-auto max-w-7xl px-4 pt-12 pb-16 sm:px-6 lg:px-8 lg:pt-16 lg:pb-24">
        <h2 class="text-sm font-bold uppercase text-impost-primary lg:text-base">Misi</h2>

        <h3 class="mt-6 max-w-4xl text-3xl font-bold leading-tight text-white sm:text-4xl lg:text-5xl">
          Tiga Pilar Komitmen Kami
        </h3>

        <ul class="mt-10 max-w-4xl space-y-8">
          <li v-for="(item, index) in misi" :key="index" class="flex items-start gap-5">
            <span class="text-sm font-bold text-impost-primary lg:text-base">
              {{ index + 1 }}
            </span>
            <p class="text-sm leading-relaxed text-white lg:text-base">
              {{ item.text }}
            </p>
          </li>
        </ul>
      </Reveal>
    </section>

    <!-- Makna Logo -->
    <section class="bg-paper">
      <Reveal class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
        <h2 class="text-sm font-bold uppercase text-impost-primary lg:text-base">Makna Logo</h2>

        <img src="/img/logo_ori.png" alt="Logo Impost Media" loading="lazy"
          class="mx-auto mt-10 block w-full max-w-sm rounded-3xl bg-white p-4">

        <p class="mx-auto mt-10 max-w-4xl text-center text-sm leading-relaxed text-ink lg:text-base">
          Siluet lensa kamera, melambangkan kenaikan, dan fokus tajam pada segmentasi yang terukur. Lensa kamera
          diikuti oleh garis melengkung yang dinamis, merepresentasikan aliran, gerakan, dan kreativitas yang adaptif.
        </p>

        <div class="mx-auto mt-10 grid max-w-4xl gap-8 text-center sm:grid-cols-3">
          <div>
            <h3 class="text-base font-bold text-ink">Text</h3>
            <p class="mt-2 text-sm leading-relaxed text-ink">
              Representasi visual yang modern dan minimalis, melambangkan fokus presisi strategis dan analisis data
              yang tajam dalam produksi media kreatif.
            </p>
          </div>
          <div>
            <h3 class="text-base font-bold text-ink">Kamera</h3>
            <p class="mt-2 text-sm leading-relaxed text-ink">
              Representasi energi dan pergerakan yang dinamis, berproses, meningkat, dan perubahan yang aktif secara
              kreatif.
            </p>
          </div>
          <div>
            <h3 class="text-base font-bold text-ink">Swirl/Spiral</h3>
            <p class="mt-2 text-sm leading-relaxed text-ink">
              Identitas kepemilikan yang tegas, kuat, dan terstruktur secara jelas.
            </p>
          </div>
        </div>
      </Reveal>
    </section>

    <!-- Struktur Organisasi -->
    <section class="bg-paper">
      <Reveal class="mx-auto max-w-7xl px-4 pb-16 sm:px-6 lg:px-8 lg:pb-24">
        <h2 class="text-sm font-bold uppercase text-impost-primary lg:text-base">Struktur Organisasi</h2>
        <img src="/img/struktur_organisasi.png" alt="Struktur organisasi Impost Media" loading="lazy"
          class="mx-auto mt-10 block w-full max-w-5xl rounded-3xl bg-white p-4">
      </Reveal>
    </section>
  </HomeLayout>
</template>
