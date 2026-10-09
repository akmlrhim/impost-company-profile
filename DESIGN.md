# Design System

Design system documentation for Impost Media project.

## Tech Stack

- **CSS Framework**: Tailwind CSS v4
- **Component Library**: Flowbite v4
- **Interactivity**: Alpine.js v3
- **Typography**: @tailwindcss/typography, flowbite-typography
- **Font**: Plus Jakarta Sans (Google Fonts)

## Color Palette

### Primary Colors

Custom color tokens are defined in `resources/css/app.css`.

| Token | Hex | Usage |
|-------|-----|------------|
| `impost-primary` | `#d4ac3c` | Primary CTA, accent, highlight |
| `impost-primary-dark` | `#b89533` | Primary hover state |
| `impost-secondary` | `#d09738` | Secondary accent |
| `impost-third` | `#95774f` | Tertiary accent |
| `impost-fourth` | `#503924` | Dark accent |
| `impost-fifth` | `#040404` | Main background (near black) |

### Dark Scale

Background variations for depth and layering:

| Token | Hex |
|-------|-----|
| `impost-dark-950` | `#0a0a0a` |
| `impost-dark-900` | `#0f0f0f` |
| `impost-dark-850` | `#111111` |
| `impost-dark-800` | `#121212` |
| `impost-dark-750` | `#151515` |
| `impost-dark-700` | `#161616` |
| `impost-dark-650` | `#1a1a1a` |
| `impost-dark-600` | `#222222` |

### Base Colors

- **Background**: `#040404` (impost-fifth)
- **Text**: `#ffffff`
- **Muted text**: `rgba(255, 255, 255, 0.6)`
- **Border**: `rgba(255, 255, 255, 0.08)` - `rgba(255, 255, 255, 0.1)`

## Typography

### Font Family

```css
--font-sans: "Plus Jakarta Sans", ui-sans-serif, system-ui, sans-serif;
--font-header: "Plus Jakarta Sans", ui-sans-serif, system-ui, sans-serif;
--font-mono: ui-monospace, monospace;
```

### Font Weights

- **Headings**: `font-bold` (700)
- **Body**: `font-medium` (500), `font-semibold` (600)
- **Small/Labels**: `font-bold` (700)

### Font Features

Headings use `font-feature-settings: "ss01", "ss02"` for stylistic sets.

### Type Scale

**Headings:**
- H1: `text-2xl sm:text-3xl lg:text-6xl` (responsive)
- H2-H6: `font-bold` with tight leading

**Body:**
- Base: `text-xs md:text-base`
- Small: `text-xs`
- Large: `text-base`

**Line Heights:**
- Headings: `leading-[1.1]`, `leading-tight`
- Body: `leading-relaxed`, `leading-snug`

## Spacing & Layout

### Container

```css
max-w-7xl mx-auto px-4 sm:px-6 lg:px-8
```

Container pattern is consistent across all sections:
- Max width: `7xl` (80rem / 1280px)
- Horizontal padding responsive: `px-4` → `sm:px-6` → `lg:px-8`

### Section Spacing

- **Vertical padding**: `py-12 sm:py-20 md:py-28 lg:py-36`
- **Section alt background**: `bg-white/[0.025]` (subtle contrast)

### Grid Systems

**Footer:**
```
grid-cols-1 lg:grid-cols-[1.3fr_2fr] gap-12 lg:gap-20
```

**Card grids:**
```
grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6
```

## Components

### Buttons

**Primary CTA:**
```html
class="inline-flex items-center justify-center gap-2 text-sm font-bold 
       rounded-full px-8 py-3.5 bg-impost-primary text-impost-fifth 
       hover:bg-impost-secondary transition-colors duration-150"
```

**Secondary/Outline:**
```html
class="inline-flex items-center justify-center gap-2 text-sm font-bold 
       rounded-full px-7 py-3.5 text-white border-2 border-white/30 
       hover:border-white/70 transition-colors duration-150"
```

**Nav button:**
```html
class="text-sm font-bold rounded-full px-5 py-2.5 bg-impost-primary 
       text-impost-fifth hover:bg-impost-secondary"
```

### Navigation

**Desktop nav links:**
```html
class="px-3 py-1.5 rounded-full text-sm font-semibold transition-colors duration-200
       hover:bg-white/8"
```

**Active state:**
```html
class="bg-white/10 text-white"
```

**Mobile menu:**
```html
class="block px-4 py-2.5 rounded-xl text-sm font-semibold 
       hover:bg-white/8 hover:text-white transition-colors"
```

### Cards

**Service Card:**
```html
class="group relative h-72 sm:h-80 rounded-[2rem] overflow-hidden cursor-pointer
       border border-white/8 shadow-[0_8px_32px_rgba(0,0,0,0.4)]
       hover:shadow-[0_20px_60px_rgba(0,0,0,0.65)] hover:border-impost-primary/30
       transform-gpu transition-all duration-300"
```

**Card hover effects:**
- Image scale: `group-hover:scale-105`
- Title color: `group-hover:text-impost-primary`
- Underline expand: `w-6` → `group-hover:w-12`
- Description reveal: `grid-rows-[0fr]` → `group-hover:grid-rows-[1fr]`

### Badges

**Primary badge:**
```html
class="inline-flex items-center gap-1 px-3.5 py-1 rounded-full text-[11px] 
       font-bold uppercase tracking-wider bg-impost-primary text-impost-fifth"
```

**Outline badge:**
```html
class="inline-flex items-center gap-1 px-3.5 py-1 rounded-full text-[11px] 
       font-bold uppercase tracking-wider border border-white/20 text-white"
```

### Navbar

**Fixed navbar:**
```html
class="fixed top-0 z-50 w-full transition-all duration-300"
```

**Scrolled state:**
```html
class="bg-impost-fifth/85 backdrop-blur-2xl border-b border-white/10 
       shadow-[0_8px_30px_rgba(0,0,0,0.5)]"
```

**Transparent state:**
```html
class="bg-transparent border-b border-transparent"
```

### Dropdown

```html
class="absolute left-1/2 -translate-x-1/2 mt-2 w-44 bg-impost-fifth 
       border border-white/10 rounded-xl shadow-[0_16px_40px_rgba(0,0,0,0.6)] 
       overflow-hidden z-50"
```

### Social Icons

```html
class="w-9 h-9 rounded-lg bg-white/[0.05] border border-white/[0.08] 
       flex items-center justify-center text-white/50 
       hover:text-white hover:bg-white/[0.10] hover:border-white/20 
       transition-all duration-200"
```

## Animations

### Float Animation

```css
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-18px); }
}

.animate-float-slow   { animation: float 6s ease-in-out infinite; }
.animate-float-medium { animation: float 5s ease-in-out infinite; }
.animate-float-fast   { animation: float 4s ease-in-out infinite; }
```

### Marquee

```css
@keyframes marquee {
  from { transform: translate3d(0, 0, 0); }
  to { transform: translate3d(-50%, 0, 0); }
}

.animate-marquee {
  animation: marquee var(--marquee-speed) linear infinite;
  will-change: transform;
  backface-visibility: hidden;
}

.animate-marquee:hover { animation-play-state: paused; }
```

### Fade In Up

```css
@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(24px); }
  to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in-up { animation: fadeInUp 0.55s ease-out forwards; }
```

### Reduced Motion

```css
@media (prefers-reduced-motion: reduce) {
  .blur-3xl,
  .animate-marquee,
  .animate-float-slow,
  .animate-float-medium,
  .animate-float-fast {
    animation: none !important;
    transition: none !important;
  }
}
```

## Utility Classes

### Scrollbar

**Hide scrollbar:**
```css
.no-scrollbar::-webkit-scrollbar { display: none; }
.no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

.hide-scrollbar::-webkit-scrollbar { display: none; }
.hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
```

**Custom scrollbar:**
```css
.custom-scrollbar::-webkit-scrollbar { width: 4px; }
.custom-scrollbar::-webkit-scrollbar-thumb {
  background: rgba(255, 255, 255, 0.1);
  border-radius: 10px;
}
```

### Slider

```css
.slider-container {
  scroll-snap-type: x mandatory;
  -webkit-overflow-scrolling: touch;
  scrollbar-width: none;
}

.slider-item {
  scroll-snap-align: start;
  flex-shrink: 0;
}
```

### Blur GPU Optimization

```css
@supports (backdrop-filter: blur(1px)) {
  .blur-3xl {
    filter: blur(64px);
    transform: translateZ(0);
    backface-visibility: hidden;
  }
}
```

### Alpine.js

```css
[x-cloak] { display: none !important; }
```

## Gradients

### Hero Overlay

```html
class="bg-gradient-to-b from-black/65 via-black/50 to-impost-fifth"
```

### Card Overlay

```html
class="bg-gradient-to-t from-black/90 via-black/30 to-transparent"
```

## Shadows

**Card shadows:**
- Default: `shadow-[0_8px_32px_rgba(0,0,0,0.4)]`
- Hover: `shadow-[0_20px_60px_rgba(0,0,0,0.65)]`

**Navbar shadow:**
```
shadow-[0_8px_30px_rgba(0,0,0,0.5)]
```

**Dropdown shadow:**
```
shadow-[0_16px_40px_rgba(0,0,0,0.6)]
```

## Borders

**Standard border:**
```
border border-white/8
border border-white/10
```

**Hover states:**
```
hover:border-impost-primary/30
hover:border-white/20
hover:border-white/70
```

## Responsive Breakpoints

Tailwind default breakpoints:
- `sm`: 640px
- `md`: 768px
- `lg`: 1024px
- `xl`: 1280px
- `2xl`: 1536px

## Accessibility

- **Focus states**: Default browser focus
- **ARIA labels**: All interactive elements have `aria-label`
- **Reduced motion**: Respects `prefers-reduced-motion`
- **Color contrast**: White text on dark backgrounds
- **Keyboard navigation**: Alpine.js `@keydown.escape.window`

## Performance

- **GPU acceleration**: `transform-gpu`, `will-change-transform`, `translateZ(0)`
- **Image optimization**: `loading="lazy"`, `decoding="async"`, WebP format
- **Font loading**: Preload with `onload` swap
- **Backdrop filter**: GPU-optimized blur

## File Structure

```
resources/
├── css/
│   └── app.css              # Main CSS, custom theme, animations
├── views/
│   ├── layouts/
│   │   └── public.blade.php # Base layout
│   └── components/
│       ├── partials/
│       │   ├── navbar.blade.php
│       │   └── footer.blade.php
│       ├── home/            # Homepage sections
│       └── public/          # Public page sections
```

## Usage Examples

### Section Container

```html
<section class="relative py-12 sm:py-20 md:py-28 lg:py-36">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Content -->
  </div>
</section>
```

### Section with Alt Background

```html
<section class="im-section-alt py-12 sm:py-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Content -->
  </div>
</section>
```

### Primary Heading

```html
<h1 class="text-2xl sm:text-3xl lg:text-6xl font-bold leading-[1.1] text-white mb-6">
  Heading Text
</h1>
```

### Body Text

```html
<p class="text-xs md:text-base font-medium leading-relaxed text-white">
  Body text content
</p>
```

### Primary Button

```html
<a href="#" class="inline-flex items-center justify-center gap-2 text-sm font-bold 
   rounded-full px-8 py-3.5 bg-impost-primary text-impost-fifth 
   hover:bg-impost-secondary transition-colors duration-150">
  Button Text
  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
          d="M13 7l5 5m0 0l-5 5m5-5H6" />
  </svg>
</a>
```

## Copywriting & Design Rules

- **No em dashes**: Do not use em dashes (—) in copywriting. Use commas, periods, or separate sentences instead.
- **No excessive gradients**: Use gradients sparingly. Only for image overlays and subtle background transitions. Avoid decorative multi-color or high-contrast gradients.
- **Plain numbering**: Do not use zero-padded numbers (01, 02, 03). Use plain numbers instead: 1, 2, 3, 4.

## Notes

- Dark-first theme, no light mode toggle
- All custom colors prefixed with `impost-`
- Consistent border radius: `rounded-full`, `rounded-xl`, `rounded-[2rem]`
- Fast transitions: `duration-150`, `duration-200`, `duration-300`
- Hover states essential for interactivity
- Mobile-first responsive design
