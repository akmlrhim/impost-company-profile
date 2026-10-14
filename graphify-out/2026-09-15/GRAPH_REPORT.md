# Graph Report - impostmedia  (2026-09-15)

## Corpus Check
- 286 files · ~292,007 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 4650 nodes · 12747 edges · 239 communities (138 shown, 8 thin omitted)
- Extraction: 88% EXTRACTED · 12% INFERRED · 0% AMBIGUOUS · INFERRED: 1466 edges (avg confidence: 0.85)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `7e84b686`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- components/chart.js
- rich-editor.js
- stat/chart.js
- markdown-editor.js
- Ae
- constructor
- _update
- fromObject
- draw
- r
- _update
- Illuminate\Database\Eloquent\Model
- x
- Filament\Actions
- qt
- Filament\Forms\Form
- o
- deleteInDirection
- quill.js
- getSelectedRange
- getMinMax
- te
- Re
- Cn
- I
- updateElements
- .forEach
- A
- Illuminate\Database\Migrations\Migration
- get
- constructor
- I
- qt
- notifications.js
- updateElements
- Illuminate\Http\Request
- Illuminate\Database\Eloquent\Factories\Factory
- BaseEditRecord
- render
- support.js
- getOptionScopes
- constructor
- package.json
- getDatasetMeta
- .length
- isHorizontal
- Illuminate\Database\Seeder
- insertString
- ShadowBlot
- StatsOverview.php
- echo.js
- getDatasetMeta
- AdminPanelProvider.php
- file-upload.js
- .push
- notifyEditorElement
- serializeSelectionToDataTransfer
- filament/app.js
- format
- toString
- e
- getLocationRange
- DESIGN.md
- .reduce
- appendBlockForElement
- AGENTS.md
- select.js
- Se
- .remove
- color-picker.js
- fn
- Cloud CLI
- v
- Wi
- r
- t
- ye
- Me
- .insert
- require-dev
- date-time-picker.js
- Fe
- composer.json
- require
- scripts
- EventEmitter
- web.blade.php
- D
- _clone
- Dashboard
- config
- Detection Checklist
- AppServiceProvider
- promo.blade.php
- Process
- Architecture Best Practices
- Be
- de
- laravel-best-practices/SKILL.md
- Security Best Practices
- pe
- te
- GenerateSitemap.php
- psr-4
- logging.php
- Tailwind CSS Development
- addEventListener
- e
- Advanced Query Best Practices
- console.php
- ExampleTest
- LeafBlot
- autoload-dev
- extra
- graphify.js
- n
- Events and Notifications Best Practices
- Migration Best Practices
- Queue and Job Best Practices
- Caching Best Practices
- Database Performance Best Practices
- Eloquent Best Practices
- Product
- l
- Blade and View Best Practices
- Error Handling Best Practices
- Task Scheduling Best Practices
- Endpoint Tests
- uf
- Collection Best Practices
- HTTP Client Best Practices
- Mail Best Practices
- Routing and Controller Best Practices
- Convention and Style Best Practices
- Validation and Forms Best Practices
- Assertions
- testing-best-practices/SKILL.md
- Fakes, Mocks, and Determinism
- Test Suite Performance
- Reviewing Tests
- laravel-boost
- Naming and Structure
- TestCase
- Factories and Test Data
- Testing Best Practices
- .opencode/opencode.json

## God Nodes (most connected - your core abstractions)
1. `_update()` - 90 edges
2. `x()` - 88 edges
3. `_update()` - 85 edges
4. `te()` - 74 edges
5. `V()` - 66 edges
6. `r()` - 64 edges
7. `constructor()` - 63 edges
8. `o()` - 61 edges
9. `Cn()` - 53 edges
10. `Ae()` - 51 edges

## Surprising Connections (you probably didn't know these)
- `makeLead()` --calls--> `Lead`  [EXTRACTED]
  tests/Feature/AdminDashboardTest.php → app/Models/Lead.php
- `constructor()` --indirect_call--> `Yn()`  [INFERRED]
  public/js/filament/widgets/components/stats-overview/stat/chart.js → public/js/filament/filament/echo.js
- `te()` --indirect_call--> `Pr()`  [INFERRED]
  public/js/filament/forms/components/markdown-editor.js → public/js/filament/filament/echo.js
- `[x]()` --indirect_call--> `k()`  [INFERRED]
  public/js/filament/forms/components/color-picker.js → public/js/filament/forms/components/select.js
- `getType()` --indirect_call--> `Rt()`  [INFERRED]
  public/js/filament/forms/components/file-upload.js → public/js/filament/support/support.js

## Import Cycles
- None detected.

## Communities (239 total, 8 thin omitted)

### Community 0 - "components/chart.js"
Cohesion: 0.01
Nodes (119): abutsStart(), acquireContext(), addControllers(), addPlugins(), addScales(), Au(), ba(), beforeDatasetDraw() (+111 more)

### Community 1 - "rich-editor.js"
Cohesion: 0.02
Nodes (123): activateAttributeIfSupported(), addHTMLAttribute(), appendStringToTextAtIndex(), applyBlockAttribute(), attachmentDidChangeUploadProgress(), attachmentIsManaged(), canRedo(), canUndo() (+115 more)

### Community 2 - "stat/chart.js"
Cohesion: 0.02
Nodes (114): aa(), active(), addControllers(), addPlugins(), addScales(), an(), _animateOptions(), At() (+106 more)

### Community 3 - "markdown-editor.js"
Cohesion: 0.05
Nodes (102): Ac(), af(), ai(), al(), An(), ao(), ar(), Ba() (+94 more)

### Community 4 - "Ae"
Cohesion: 0.09
Nodes (72): be(), Ae(), Bc(), Be(), bl(), ue(), u(), de() (+64 more)

### Community 5 - "constructor"
Cohesion: 0.05
Nodes (103): addAttribute(), addAttributeAtRange(), addAttributesAtRange(), appendText(), applyBlockAttributeAtRange(), canBeGroupedWith(), charAt(), consolidate() (+95 more)

### Community 6 - "_update"
Cohesion: 0.05
Nodes (69): addBox(), afterBuildTicks(), afterCalculateLabelRotation(), afterDataLimits(), afterFit(), afterSetDimensions(), afterTickToLabelConversion(), afterUpdate() (+61 more)

### Community 7 - "fromObject"
Cohesion: 0.03
Nodes (125): _a(), after(), afterAutoSkip(), Ag(), Ai(), Al(), as(), before() (+117 more)

### Community 8 - "draw"
Cohesion: 0.06
Nodes (66): adjustHitBoxes(), ae(), afterDraw(), cd(), _computeLabelArea(), _computeTitleHeight(), cs(), draw() (+58 more)

### Community 9 - "r"
Cohesion: 0.04
Nodes (128): aspectRatio(), At(), average(), Bs(), Bt(), Ca(), cc(), co() (+120 more)

### Community 10 - "_update"
Cohesion: 0.06
Nodes (60): addElements(), afterBuildTicks(), afterCalculateLabelRotation(), afterDataLimits(), afterDraw(), afterFit(), afterSetDimensions(), afterTickToLabelConversion() (+52 more)

### Community 11 - "Illuminate\Database\Eloquent\Model"
Cohesion: 0.04
Nodes (27): CommentController, Controller, HomeController, LandingController, SitemapController, VerifyIdController, Article, ArticleCategory (+19 more)

### Community 12 - "x"
Cohesion: 0.15
Nodes (59): at(), B(), he(), br(), Bt(), Cr(), Ct(), da() (+51 more)

### Community 13 - "Filament\Actions"
Cohesion: 0.05
Nodes (28): CreateArticleCategory, ListArticleCategories, CreateArticle, ListArticles, CreateClient, ListClients, CreateComment, ListComments (+20 more)

### Community 14 - "qt"
Cohesion: 0.12
Nodes (22): ai(), Cr(), $e(), es(), Et(), hs(), is(), Ln() (+14 more)

### Community 15 - "Filament\Forms\Form"
Cohesion: 0.06
Nodes (28): Login, ArticleCategoryResource, App\Filament\Resources\ArticleCategoryResource\Pages, App\Filament\Resources\ArticleResource\Pages, ClientResource, App\Filament\Resources\ClientResource\Pages, App\Filament\Resources\CommentResource\Pages, EmployeeResource (+20 more)

### Community 16 - "o"
Cohesion: 0.06
Nodes (79): acquireContext(), adjustHitBoxes(), bc(), Bl(), c(), clear(), _computeLabelArea(), _computeTitleHeight() (+71 more)

### Community 17 - "deleteInDirection"
Cohesion: 0.08
Nodes (34): ArrowLeft(), ArrowRight(), backspace(), canDecreaseBlockAttributeLevel(), d(), delete(), deleteByComposition(), deleteByCut() (+26 more)

### Community 18 - "quill.js"
Cohesion: 0.08
Nodes (48): BaseTheme(), BaseTooltip(), Block(), BlockEmbed(), Blockquote(), Bold(), Break(), BubbleTheme() (+40 more)

### Community 19 - "getSelectedRange"
Cohesion: 0.06
Nodes (64): attachmentManagerDidRequestRemovalOfAttachment(), breakFormattedBlock(), breaksOnReturn(), canSetCurrentAttribute(), canSetCurrentBlockAttribute(), compositionControllerDidRequestRemovalOfAttachment(), copyWithoutText(), createCaptionElement() (+56 more)

### Community 20 - "getMinMax"
Cohesion: 0.25
Nodes (11): aa(), determineDataLimits(), Dh(), _getLabelBounds(), getMinMax(), _getOtherScale(), getUserBounds(), handleTickRangeOptions() (+3 more)

### Community 21 - "te"
Cohesion: 0.05
Nodes (10): Bi(), bn(), Id(), ji(), kd(), qd(), qi(), Ri() (+2 more)

### Community 22 - "Re"
Cohesion: 0.16
Nodes (50): Aa(), $c(), X(), ca(), me(), D(), E(), Ea() (+42 more)

### Community 23 - "Cn"
Cohesion: 0.10
Nodes (64): Cn(), b(), Bt(), Ct(), dn(), Dt(), Ft(), G() (+56 more)

### Community 24 - "I"
Cohesion: 0.07
Nodes (50): add(), Bi(), C(), Co(), _computeLabelSizes(), determineDataLimits(), endOf(), Et() (+42 more)

### Community 25 - "updateElements"
Cohesion: 0.04
Nodes (80): xg(), ac(), Ai(), Ao(), applyStack(), ar(), as(), aspectRatio() (+72 more)

### Community 26 - ".forEach"
Cohesion: 0.08
Nodes (19): addButton(), addControls(), addSelect(), ColorPicker(), ContainerBlot(), create(), Embed(), expandConfig() (+11 more)

### Community 27 - "A"
Cohesion: 0.05
Nodes (71): oi(), A(), add(), applyKeyboardCommand(), attachmentDidChangeAttributes(), attachmentEditorDidRequestRemovalOfAttachment(), attributeChangedCallback(), Ca() (+63 more)

### Community 28 - "Illuminate\Database\Migrations\Migration"
Cohesion: 0.06
Nodes (3): Illuminate\Database\Migrations\Migration, Illuminate\Database\Schema\Blueprint, Illuminate\Support\Facades\Schema

### Community 29 - "get"
Cohesion: 0.11
Nodes (23): active(), add(), _animateOptions(), _cachedScopes(), _createAnimations(), get(), _getAnims(), getOptionScopes() (+15 more)

### Community 30 - "constructor"
Cohesion: 0.09
Nodes (23): Bi(), chartOptionScopes(), constructor(), describe(), Ec(), Fr(), getDevicePixelRatio(), getMeta() (+15 more)

### Community 31 - "I"
Cohesion: 0.11
Nodes (52): Ae(), ar(), at(), Bi(), I(), c(), H(), d() (+44 more)

### Community 32 - "qt"
Cohesion: 0.07
Nodes (38): Ah(), an(), ch(), color(), darken(), dataset(), Dc(), desaturate() (+30 more)

### Community 33 - "notifications.js"
Cohesion: 0.06
Nodes (23): actions(), button(), constructor(), danger(), dispatch(), dispatchSelf(), dispatchTo(), duration() (+15 more)

### Community 34 - "updateElements"
Cohesion: 0.04
Nodes (94): ad(), af(), applyStack(), bf(), buildTicks(), C(), _calculateBarIndexPixels(), _calculateBarValuePixels() (+86 more)

### Community 35 - "Illuminate\Http\Request"
Cohesion: 0.14
Nodes (13): MinifyHtml, SecurityHeaders, CustomPagination, SearchBar, Closure, Illuminate\Contracts\Pagination\LengthAwarePaginator, Illuminate\Contracts\View\View, Illuminate\Foundation\Application (+5 more)

### Community 36 - "Illuminate\Database\Eloquent\Factories\Factory"
Cohesion: 0.07
Nodes (16): ArticleCategoryFactory, ArticleFactory, CommentFactory, JobPostingFactory, JobVacancyDetailFactory, JobVacancyFactory, PortfolioCategoryFactory, PortfolioFactory (+8 more)

### Community 37 - "BaseEditRecord"
Cohesion: 0.07
Nodes (14): EditArticleCategory, EditArticle, EditClient, EditComment, EditEmployee, EditJobVacancy, BaseEditRecord, EditPortfolioCategory (+6 more)

### Community 38 - "render"
Cohesion: 0.06
Nodes (49): xt(), beforeinput(), cacheViewForObject(), canSyncDocumentView(), compositionDidLoadSnapshot(), copyUsingObjectMap(), copyUsingObjectsFromDocument(), createAttachmentNodes() (+41 more)

### Community 39 - "support.js"
Cohesion: 0.09
Nodes (52): _a(), aa(), ba(), Be(), br(), T(), Ca(), ce() (+44 more)

### Community 40 - "getOptionScopes"
Cohesion: 0.11
Nodes (24): _a(), al(), ba(), _cachedScopes(), createResolver(), datasetElementScopeKeys(), get(), _getAnims() (+16 more)

### Community 41 - "constructor"
Cohesion: 0.06
Nodes (38): alpha(), be(), chartOptionScopes(), constructor(), Ct(), data(), describe(), en() (+30 more)

### Community 42 - "package.json"
Cohesion: 0.07
Nodes (30): dependencies, alpinejs, @alpinejs/collapse, flowbite, flowbite-typography, devDependencies, axios, concurrently (+22 more)

### Community 43 - "getDatasetMeta"
Cohesion: 0.06
Nodes (47): addElements(), afterDatasetsUpdate(), buildOrUpdateControllers(), buildOrUpdateElements(), clear(), cn(), _d(), _dataCheck() (+39 more)

### Community 44 - ".length"
Cohesion: 0.13
Nodes (12): bubbleFormats(), contains(), find(), handleBackspace(), handleDelete(), handleDeleteRange(), Iterator(), Keyboard() (+4 more)

### Community 45 - "isHorizontal"
Cohesion: 0.09
Nodes (33): afterAutoSkip(), buildLookupTable(), buildTicks(), computeTickLimit(), diff(), _drawArgs(), Fi(), _generate() (+25 more)

### Community 46 - "Illuminate\Database\Seeder"
Cohesion: 0.12
Nodes (11): ArticleCategorySeeder, DatabaseSeeder, PortfolioCategorySeeder, PortfolioSeeder, ServiceSeeder, StudyCaseSeeder, TeamSeeder, TestimonialSeeder (+3 more)

### Community 47 - "insertString"
Cohesion: 0.05
Nodes (65): attachFiles(), canApplyToDocument(), compositionend(), compositionstart(), compositionupdate(), createLinkHTML(), deleteByDrag(), dragend() (+57 more)

### Community 48 - "ShadowBlot"
Cohesion: 0.08
Nodes (5): BlockBlot(), EmbedBlot(), FormatBlot(), InlineBlot(), ShadowBlot()

### Community 49 - "StatsOverview.php"
Cohesion: 0.07
Nodes (15): ArticleResource, CommentResource, JobVacancyResource, PortfolioResource, StudyCaseResource, LeadsChart, StatsOverview, Lead (+7 more)

### Community 50 - "echo.js"
Cohesion: 0.09
Nodes (15): a(), ar(), b(), cr(), H(), ji(), L(), Me() (+7 more)

### Community 51 - "getDatasetMeta"
Cohesion: 0.10
Nodes (30): afterDatasetsUpdate(), buildOrUpdateControllers(), _destroyDatasetMeta(), generateLabels(), getController(), getDatasetMeta(), getDataVisibility(), _getLegendItemAt() (+22 more)

### Community 52 - "AdminPanelProvider.php"
Cohesion: 0.09
Nodes (22): App\Filament\Widgets, User, AdminPanelProvider, Filament\Http\Middleware\Authenticate, Filament\Http\Middleware\AuthenticateSession, Filament\Http\Middleware\DisableBladeIconComponents, Filament\Http\Middleware\DispatchServingFilamentEvent, Filament\Models\Contracts\FilamentUser (+14 more)

### Community 53 - "file-upload.js"
Cohesion: 0.05
Nodes (61): ba(), bi(), c(), ca(), clickPercent(), constructor(), de(), define() (+53 more)

### Community 54 - ".push"
Cohesion: 0.14
Nodes (18): combineFormats(), cursor_normalize_diff(), diff_bisect_(), diff_bisectSplit_(), diff_cleanupMerge(), diff_commonPrefix(), diff_commonSuffix(), diff_compute_() (+10 more)

### Community 55 - "notifyEditorElement"
Cohesion: 0.11
Nodes (21): actionIsExternal(), canInvokeAction(), compositionControllerDidBlur(), compositionControllerDidSyncDocumentView(), compositionDidAddAttachment(), compositionDidChangeAttachmentPreviewURL(), compositionDidChangeCurrentAttributes(), compositionDidChangeDocument() (+13 more)

### Community 56 - "serializeSelectionToDataTransfer"
Cohesion: 0.06
Nodes (38): attachmentForFile(), attributesForFile(), canSetCurrentTextAttribute(), compositionShouldAcceptFile(), cut(), didChangeAttributes(), didClickAttachment(), dragstart() (+30 more)

### Community 57 - "filament/app.js"
Cohesion: 0.17
Nodes (22): B(), C(), D(), H(), I(), J(), O(), U() (+14 more)

### Community 58 - "format"
Cohesion: 0.04
Nodes (62): Ac(), ar(), Bl(), Ce(), cf(), clone(), Dl(), dtFormatter() (+54 more)

### Community 59 - "toString"
Cohesion: 0.12
Nodes (18): box(), canBeConsolidatedWith(), compositionControllerDidRender(), fromUCS2String(), getDirection(), getTargetDOMRange(), hasSameAttributesAsPiece(), hasSameConstructorAs() (+10 more)

### Community 60 - "e"
Cohesion: 0.09
Nodes (33): addEventListener(), bindEvents(), bindResponsiveEvents(), bindUserEvents(), buildOrUpdateScales(), _checkEventBindings(), cs(), _destroy() (+25 more)

### Community 61 - "getLocationRange"
Cohesion: 0.09
Nodes (33): canAcceptDataTransfer(), canDecreaseNestingLevel(), canIncreaseNestingLevel(), compositionControllerDidFocus(), compositionDidRequestChangingSelectionToLocationRange(), createDOMRangeFromPoint(), createLocationRangeFromDOMRange(), decreaseNestingLevel() (+25 more)

### Community 62 - "DESIGN.md"
Cohesion: 0.05
Nodes (36): Badges & Status, Border Radius Scale, Brand & Accent, Breakpoints, Buttons, Cards & Containers, Collapsing Strategy, Colors (+28 more)

### Community 63 - ".reduce"
Cohesion: 0.13
Nodes (11): applyFormat(), AttributorStore(), _defineProperty(), endsWithNewlineChange(), getLastChangeIndex(), makeEmbedArrowHandler(), matchAlias(), matchAttributor() (+3 more)

### Community 64 - "appendBlockForElement"
Cohesion: 0.17
Nodes (21): It(), appendAttachmentWithAttributes(), appendBlockForAttributesWithElement(), appendBlockForElement(), appendBlockForTextNode(), appendEmptyBlock(), appendPiece(), appendStringWithAttributes() (+13 more)

### Community 65 - "AGENTS.md"
Cohesion: 0.06
Nodes (33): APIs & Eloquent Resources, Application Structure & Architecture, Artisan, Conventions, Database, Deployment, Do Things the Laravel Way, Documentation Files (+25 more)

### Community 66 - "select.js"
Cohesion: 0.09
Nodes (17): [g](), d(), ee(), et(), g(), h(), J(), le (+9 more)

### Community 67 - "Se"
Cohesion: 0.18
Nodes (5): Ne(), nt(), Qe(), Se, xe()

### Community 68 - ".remove"
Cohesion: 0.15
Nodes (6): Attributor(), camelize(), ClassAttributor(), extractVideoUrl(), match(), StyleAttributor()

### Community 69 - "color-picker.js"
Cohesion: 0.14
Nodes (3): style(), update(), [x]()

### Community 70 - "fn"
Cohesion: 0.20
Nodes (19): Qt(), da(), fa(), Fi(), fn(), S(), Ii(), je() (+11 more)

### Community 71 - "Cloud CLI"
Cohesion: 0.06
Nodes (30): Adding a cache to an existing environment, Adding a database to an existing environment, Checklists for Multi-Step Operations, Custom domain setup, Full environment setup (app + database + cache + domain), New app from scratch, Application Setup, Billing and Usage (+22 more)

### Community 72 - "v"
Cohesion: 0.23
Nodes (4): a(), c(), r(), v()

### Community 73 - "Wi"
Cohesion: 0.10
Nodes (26): average(), beforeDraw(), dataset(), ea(), ge(), getCenterPoint(), _getSortedDatasetMetas(), getSortedVisibleDatasetMetas() (+18 more)

### Community 74 - "r"
Cohesion: 0.17
Nodes (12): Be(), ei(), ii(), le(), ni(), oi(), r(), ri() (+4 more)

### Community 75 - "t"
Cohesion: 0.20
Nodes (11): di(), e(), g(), Ht(), i(), Ie(), Re(), t() (+3 more)

### Community 76 - "ye"
Cohesion: 0.23
Nodes (14): cd(), ee(), Et(), Fc(), ii(), oo(), Sa(), sd() (+6 more)

### Community 77 - "Me"
Cohesion: 0.15
Nodes (15): apply(), q(), B(), kn(), lt(), Me(), mo(), ms() (+7 more)

### Community 78 - ".insert"
Cohesion: 0.30
Nodes (9): computeStyle(), deltaEndsWith(), isLine(), matchBreak(), matchNewline(), matchSpacing(), matchStyles(), matchText() (+1 more)

### Community 79 - "require-dev"
Cohesion: 0.17
Nodes (12): require-dev, fakerphp/faker, fruitcake/laravel-debugbar, laravel/boost, laravel-lang/lang, laravel/pail, laravel/pint, laravel/sail (+4 more)

### Community 80 - "date-time-picker.js"
Cohesion: 0.27
Nodes (7): e(), i(), l(), Ni(), o(), t(), u()

### Community 81 - "Fe"
Cohesion: 0.20
Nodes (10): Ce(), De(), Dt(), Fe(), He(), ir(), Mt(), nr() (+2 more)

### Community 82 - "composer.json"
Cohesion: 0.22
Nodes (8): description, keywords, license, minimum-stability, name, prefer-stable, $schema, type

### Community 83 - "require"
Cohesion: 0.22
Nodes (9): require, filament/filament, intervention/image, intervention/image-laravel, laravel/framework, laravel/tinker, php, simplesoftwareio/simple-qrcode (+1 more)

### Community 84 - "scripts"
Cohesion: 0.22
Nodes (9): scripts, dev, post-autoload-dump, post-create-project-cmd, post-root-package-install, post-update-cmd, pre-package-uninstall, setup (+1 more)

### Community 85 - "EventEmitter"
Cohesion: 0.31
Nodes (3): EventEmitter(), Events(), Selection()

### Community 86 - "web.blade.php"
Cohesion: 0.25
Nodes (7): landing.sections.web.contact, landing.sections.web.hero, landing.sections.web.portfolio, landing.sections.web.pricing, landing.sections.web.problem, landing.sections.web.testimonials, landing.sections.web.whyus

### Community 87 - "D"
Cohesion: 0.23
Nodes (13): cl(), D(), Eo(), Fo(), He(), hl(), jt(), Ma() (+5 more)

### Community 88 - "_clone"
Cohesion: 0.32
Nodes (8): clone(), _clone(), __getRegExpFlags(), _instanceof(), __isArray(), __isDate(), __isRegExp(), __objToStr()

### Community 89 - "Dashboard"
Cohesion: 0.29
Nodes (3): Dashboard, Filament\Pages\Dashboard, Illuminate\Support\Facades\Auth

### Community 90 - "config"
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 91 - "Detection Checklist"
Cohesion: 0.17
Nodes (11): A. Validation & HTTP input, B. Controllers & routing, C. Authorization, D. Eloquent & models, Detection Checklist, E. Architecture & organization, F. Frontend & views, G. Database & migrations (+3 more)

### Community 92 - "AppServiceProvider"
Cohesion: 0.40
Nodes (3): AppServiceProvider, Illuminate\Support\Facades\URL, Illuminate\Support\ServiceProvider

### Community 93 - "promo.blade.php"
Cohesion: 0.33
Nodes (5): landing.sections.promo.hero, landing.sections.promo.pricing, landing.sections.promo.problem, landing.sections.promo.register, landing.sections.promo.solution

### Community 94 - "Process"
Cohesion: 0.17
Nodes (11): Edge cases, Glob mapping, Ground Rules (read before you start), Infer Conventions, Process, Step 0: Orient, Step 1: Predefined sweep, Step 2: Open-ended pass (+3 more)

### Community 95 - "Architecture Best Practices"
Cohesion: 0.17
Nodes (11): Architecture Best Practices, Depend on Contracts at Boundaries, Extract Focused Business Operations, Follow Framework Conventions, Inject Required Dependencies, Specify a Deterministic Sort Order, Use Atomic Locks for Race Conditions, Use `Concurrency::run()` for Parallel Execution (+3 more)

### Community 97 - "de"
Cohesion: 0.10
Nodes (6): de, He, oe, U(), ce(), le()

### Community 98 - "laravel-best-practices/SKILL.md"
Cohesion: 0.17
Nodes (10): Configuration Best Practices, Name Repeated Domain Values, Protect Production Secrets, Read Environment Variables in Configuration Files, Use `App::environment()` for Environment Checks, Consistency First, Decision Rules, How to Apply (+2 more)

### Community 99 - "Security Best Practices"
Cohesion: 0.17
Nodes (11): Apply Cross-Site Request Forgery Protection, Audit Dependencies, Authorize Protected Actions, Bind Query Parameters, Control Mass Assignment, Encrypt Sensitive Attributes When Appropriate, Escape Output in Its Context, Keep Secrets Out of Application Code (+3 more)

### Community 102 - "GenerateSitemap.php"
Cohesion: 0.50
Nodes (3): GenerateSitemap, Illuminate\Console\Command, Spatie\Sitemap\SitemapGenerator

### Community 103 - "psr-4"
Cohesion: 0.40
Nodes (5): autoload, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\

### Community 104 - "logging.php"
Cohesion: 0.40
Nodes (4): Monolog\Handler\NullHandler, Monolog\Handler\StreamHandler, Monolog\Handler\SyslogUdpHandler, Monolog\Processor\PsrLogMessageProcessor

### Community 105 - "Tailwind CSS Development"
Cohesion: 0.18
Nodes (10): Basic Usage, Common Pitfalls, CSS-First Configuration, Dark Mode, Documentation, Import Syntax, Replaced Utilities, Spacing (+2 more)

### Community 106 - "addEventListener"
Cohesion: 0.22
Nodes (11): addEventListener(), bindResponsiveEvents(), Du(), isAttached(), Ju(), ku(), Li(), Ma() (+3 more)

### Community 108 - "Advanced Query Best Practices"
Cohesion: 0.20
Nodes (9): Advanced Query Best Practices, Combine Related Counts with Conditional Aggregates, Compare `whereHas()` with an `IN` Subquery, Consider a Correlated Subquery for Has-Many Ordering, Create Dynamic Relationships with a Subquery Foreign Key, Design Composite Indexes for the Query, Measure Two Simple Queries Against One Complex Query, Reuse Loaded Parent Models with `setRelation()` (+1 more)

### Community 109 - "console.php"
Cohesion: 0.50
Nodes (3): Illuminate\Foundation\Inspiring, Illuminate\Support\Facades\Artisan, Illuminate\Support\Facades\Schedule

### Community 112 - "autoload-dev"
Cohesion: 0.67
Nodes (3): autoload-dev, psr-4, Tests\\

### Community 113 - "extra"
Cohesion: 0.67
Nodes (3): extra, laravel, dont-discover

### Community 115 - "n"
Cohesion: 0.12
Nodes (29): _a(), as(), r(), Dn(), Eo(), er(), fo(), a() (+21 more)

### Community 208 - "Events and Notifications Best Practices"
Cohesion: 0.20
Nodes (9): Cache Event Discovery During Production Deployment, Dispatch Queued Notifications After Commit, Events and Notifications Best Practices, Implement `HasLocalePreference` on Notifiable Models, Queue Slow Notifications, Rely on Event Discovery, Route Notification Channels to Dedicated Queues, Use On-Demand Notifications for Non-User Recipients (+1 more)

### Community 209 - "Migration Best Practices"
Cohesion: 0.20
Nodes (9): Define Foreign-Key Constraints Deliberately, Design Indexes for Real Queries, Generate Migrations with Artisan, Keep Migrations Focused, Make Rollbacks Honest, Migration Best Practices, Mirror Defaults Only When Unsaved Models Need Them, Stage Changes That Affect Existing Rows (+1 more)

### Community 210 - "Queue and Job Best Practices"
Cohesion: 0.20
Nodes (9): Back Off Transient Failures, Batch Jobs for Group Coordination, Configure Time-Based Retry Limits Deliberately, Handle Terminal Failure When Needed, Keep Reservation Time Longer Than Execution Time, Queue and Job Best Practices, Rate Limit External Calls, Use Horizon for Redis Queue Operations (+1 more)

### Community 211 - "Caching Best Practices"
Cohesion: 0.22
Nodes (8): Caching Best Practices, Configure Failover Cache Stores in Production, Consider `Cache::flexible()` for Stale-While-Revalidate, Use `Cache::add()` for Atomic Conditional Writes, Use `Cache::memo()` to Avoid Redundant Hits Within an Execution, Use `Cache::remember()` for Cache-Aside Reads, Use Cache Tags to Invalidate Related Groups, Use `once()` for In-Process Memoization

### Community 212 - "Database Performance Best Practices"
Cohesion: 0.22
Nodes (8): Add Indexes for Measured Query Patterns, Count Relationships Without Loading Them, Database Performance Best Practices, Eager Load Relationships Before Iterating, Keep Queries Out of Blade Templates, Prevent Lazy Loading in Development, Process Large Data Sets Incrementally, Select Only Needed Columns

### Community 213 - "Eloquent Best Practices"
Cohesion: 0.22
Nodes (8): Apply Global Scopes Sparingly, Cast Date and Time Attributes, Define Attribute Casts, Define Precise Relationship Types, Eloquent Best Practices, Keep Application Queries Model-Aware, Use Local Scopes for Reusable Queries, Use `whereBelongsTo()` for Relationship Queries

### Community 214 - "Product"
Cohesion: 0.22
Nodes (8): Accessibility & Inclusion, Anti-references, Brand Personality, Design Principles, Product, Product Purpose, Register, Users

### Community 215 - "l"
Cohesion: 0.33
Nodes (8): p(), ce, l(), n(), s(), t(), Te(), ee()

### Community 216 - "Blade and View Best Practices"
Cohesion: 0.25
Nodes (7): Blade and View Best Practices, Prefer Components for Explicit Interfaces, Return Blade Fragments for Partial Rendering, Share Compatible View Data with a View Composer, Share Parent Component Props with `@aware`, Use `$attributes->merge()` in Component Templates, Use `@pushOnce` for Per-Component Scripts

### Community 217 - "Error Handling Best Practices"
Cohesion: 0.25
Nodes (7): Add Context to Exception Classes, Choose Where to Report and Render Exceptions, Define JSON Rendering for API Routes, Error Handling Best Practices, Mark Exceptions the Handler Should Not Report, Prevent Duplicate Reports of One Exception Instance, Throttle High-Volume Exception Reports

### Community 218 - "Task Scheduling Best Practices"
Cohesion: 0.25
Nodes (7): Bound Work Inside the Task, Group Shared Configuration, Prevent Unwanted Overlap, Restrict Tasks by Environment, Run a Task on One Server, Run Eligible Commands in the Background, Task Scheduling Best Practices

### Community 219 - "Endpoint Tests"
Cohesion: 0.25
Nodes (7): Endpoint Coverage, Endpoint Tests, How to Write the Test, Tenant Isolation, Test Authorization at the Policy Level, Testing Validation, Which Layer Owns Which Case

### Community 220 - "uf"
Cohesion: 0.29
Nodes (8): dd(), Jl(), ki(), lr(), rd(), uf(), xl(), yr()

### Community 221 - "Collection Best Practices"
Cohesion: 0.29
Nodes (6): Choose Between `cursor()` and `lazy()`, Collection Best Practices, Use `#[CollectedBy]` for Custom Collection Classes, Use Higher-Order Messages for Simple Operations, Use `lazyById()` When Updating Records While Iterating, Use `toQuery()` for Bulk Operations on Collections

### Community 222 - "HTTP Client Best Practices"
Cohesion: 0.29
Nodes (6): Fake HTTP Requests in Tests, Handle Errors Explicitly, HTTP Client Best Practices, Pool Independent Requests, Retry Only Safe Operations, Set Explicit Timeouts

### Community 223 - "Mail Best Practices"
Cohesion: 0.29
Nodes (6): Assert the Delivery Mode, Dispatch Queued Mail After Commit, Mail Best Practices, Queue Slow Mail Delivery, Separate Content and Delivery Tests, Use Markdown Mailables When They Fit

### Community 224 - "Routing and Controller Best Practices"
Cohesion: 0.29
Nodes (6): Keep Controllers Focused on HTTP Concerns, Organize Controllers Around Resources, Routing and Controller Best Practices, Scope Nested Bindings, Use Implicit Route Model Binding, Use Resource Routes for Resourceful Actions

### Community 225 - "Convention and Style Best Practices"
Cohesion: 0.29
Nodes (6): Convention and Style Best Practices, Follow Project Naming Conventions, Keep Presentation Code Maintainable, Prefer Clear, Idiomatic Syntax, Use Utilities When They Clarify Intent, Write Comments That Explain Why

### Community 226 - "Validation and Forms Best Practices"
Cohesion: 0.29
Nodes (6): Add Cross-Field Validation After Base Rules, Express Conditional Rules Clearly, Extract Validation When It Improves the Boundary, Prefer Readable Rule Syntax, Use Only Intended Validated Data, Validation and Forms Best Practices

### Community 227 - "Assertions"
Cohesion: 0.29
Nodes (6): Arrange, Act, Assert, Assert a Known Value, Assert the Complete Result, Assertions, How to Find the Correct Assertion, Named Response Assertions

### Community 228 - "testing-best-practices/SKILL.md"
Cohesion: 0.29
Nodes (3): Built-in Laravel Assertion Methods, How to Find Test Framework Features, Security Tests

### Community 229 - "Fakes, Mocks, and Determinism"
Cohesion: 0.29
Nodes (7): Database, Fakes, Mocks, and Determinism, Framework Fakes, How to Isolate a Dependency, Mocking, Outbound HTTP Testing, Time and Randomness

### Community 230 - "Test Suite Performance"
Cohesion: 0.29
Nodes (6): Common Errors, Global Fakes, How to Find a Slow Test, How to Run the Suite in Parallel, Test Environment, Test Suite Performance

### Community 231 - "Reviewing Tests"
Cohesion: 0.29
Nodes (6): Assertions, Coverage, Data and Determinism, Names and Structure, Reviewing Tests, Test Value

### Community 232 - "laravel-boost"
Cohesion: 0.29
Nodes (6): command, enabled, type, mcp, laravel-boost, $schema

### Community 233 - "Naming and Structure"
Cohesion: 0.33
Nodes (5): File Layout, Grouping, Naming and Structure, Naming Tests, Test Function

### Community 234 - "TestCase"
Cohesion: 0.40
Nodes (3): Illuminate\Foundation\Testing\TestCase, ExampleTest, TestCase

### Community 235 - "Factories and Test Data"
Cohesion: 0.40
Nodes (4): Datasets, Each Test Makes Its Own Data, Factories and Test Data, Record Construction

### Community 236 - "Testing Best Practices"
Cohesion: 0.40
Nodes (5): Consistency First, How to Apply, Rule Index, Testing Best Practices, What to Test

## Knowledge Gaps
- **364 isolated node(s):** `$schema`, `plugin`, `$schema`, `name`, `type` (+359 more)
  These have ≤1 connection - possible missing edges or undocumented components. (Counts symbols only; 1066 node(s) total have ≤1 connection when file, concept and rationale nodes are included.)
- **8 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Br()` connect `fromObject` to `components/chart.js`, `constructor`, `t`, `x`, `A`?**
  _High betweenness centrality (0.081) - this node is a cross-community bridge._
- **Why does `constructor()` connect `constructor` to `appendBlockForElement`, `rich-editor.js`, `markdown-editor.js`, `Ae`, `fn`, `fromObject`, `render`, `toString`, `insertString`, `getSelectedRange`, `serializeSelectionToDataTransfer`, `A`?**
  _High betweenness centrality (0.046) - this node is a cross-community bridge._
- **Why does `Ls()` connect `Wi` to `components/chart.js`, `constructor`, `stat/chart.js`?**
  _High betweenness centrality (0.034) - this node is a cross-community bridge._
- **Are the 3 inferred relationships involving `_update()` (e.g. with `g()` and `f()`) actually correct?**
  _`_update()` has 3 INFERRED edges - model-reasoned connections that need verification._
- **Are the 13 inferred relationships involving `x()` (e.g. with `D()` and `g()`) actually correct?**
  _`x()` has 13 INFERRED edges - model-reasoned connections that need verification._
- **Are the 2 inferred relationships involving `_update()` (e.g. with `g()` and `f()`) actually correct?**
  _`_update()` has 2 INFERRED edges - model-reasoned connections that need verification._
- **Are the 19 inferred relationships involving `te()` (e.g. with `je()` and `Pr()`) actually correct?**
  _`te()` has 19 INFERRED edges - model-reasoned connections that need verification._