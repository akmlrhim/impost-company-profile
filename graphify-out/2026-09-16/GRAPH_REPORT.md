# Graph Report - impostmedia  (2026-09-16)

## Corpus Check
- 243 files · ~266,357 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 4306 nodes · 12416 edges · 208 communities (106 shown, 11 thin omitted)
- Extraction: 88% EXTRACTED · 12% INFERRED · 0% AMBIGUOUS · INFERRED: 1466 edges (avg confidence: 0.85)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `9d1620d0`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- components/chart.js
- rich-editor.js
- stat/chart.js
- markdown-editor.js
- n
- constructor
- _update
- get
- draw
- constructor
- _update
- Illuminate\Database\Eloquent\Model
- x
- Filament\Actions
- support.js
- Filament\Forms\Form
- o
- deleteInDirection
- quill.js
- getSelectedRange
- ec
- te
- Re
- Cn
- buildTicks
- updateElements
- .forEach
- setAttribute
- Illuminate\Database\Migrations\Migration
- e
- fromObject
- fn
- qt
- notifications.js
- updateElements
- Illuminate\Http\Request
- Illuminate\Database\Eloquent\Factories\Factory
- BaseEditRecord
- render
- t
- getOptionScopes
- constructor
- package.json
- getDatasetMeta
- .length
- getMinMax
- Illuminate\Database\Seeder
- insertString
- ShadowBlot
- Lead
- echo.js
- getDatasetMeta
- r
- file-upload.js
- .push
- notifyEditorElement
- preload
- filament/app.js
- format
- serializeSelectionToDataTransfer
- addEventListener
- getLocationRange
- DESIGN.md
- .reduce
- lt
- Se
- v
- ne
- .remove
- color-picker.js
- kn
- AdminPanelProvider.php
- select.js
- St
- r
- t
- StatsOverview.php
- p
- .insert
- require-dev
- date-time-picker.js
- Fe
- composer.json
- require
- scripts
- EventEmitter
- web.blade.php
- _p
- _clone
- Dashboard
- config
- getMinMax
- AppServiceProvider
- promo.blade.php
- da
- le
- xl
- Be
- rl
- de
- He
- oe
- GenerateSitemap.php
- psr-4
- logging.php
- pe
- addEventListener
- te
- clickPercent
- console.php
- ExampleTest
- LeafBlot
- autoload-dev
- extra
- le
- En
- Product

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

## Communities (208 total, 11 thin omitted)

### Community 0 - "components/chart.js"
Cohesion: 0.01
Nodes (119): abutsStart(), acquireContext(), addControllers(), addPlugins(), addScales(), Au(), ba(), beforeDatasetDraw() (+111 more)

### Community 1 - "rich-editor.js"
Cohesion: 0.02
Nodes (128): A(), activateAttributeIfSupported(), appendStringToTextAtIndex(), applyBlockAttribute(), attachmentDidChangeUploadProgress(), attachmentIsManaged(), attributeChangedCallback(), Ca() (+120 more)

### Community 2 - "stat/chart.js"
Cohesion: 0.02
Nodes (102): aa(), active(), an(), _animateOptions(), beforeDatasetDraw(), beforeDatasetsDraw(), Bn(), br() (+94 more)

### Community 3 - "markdown-editor.js"
Cohesion: 0.04
Nodes (128): _a(), Ac(), Ae(), af(), ai(), al(), ao(), ar() (+120 more)

### Community 4 - "n"
Cohesion: 0.11
Nodes (59): be(), Bc(), Be(), bl(), ue(), u(), r(), de() (+51 more)

### Community 5 - "constructor"
Cohesion: 0.04
Nodes (116): addAttribute(), addAttributeAtRange(), addAttributesAtRange(), addHTMLAttribute(), appendText(), applyBlockAttributeAtRange(), box(), canBeConsolidatedWith() (+108 more)

### Community 6 - "_update"
Cohesion: 0.05
Nodes (69): addBox(), afterBuildTicks(), afterCalculateLabelRotation(), afterDataLimits(), afterFit(), afterSetDimensions(), afterTickToLabelConversion(), afterUpdate() (+61 more)

### Community 7 - "get"
Cohesion: 0.11
Nodes (23): active(), add(), _animateOptions(), _cachedScopes(), _createAnimations(), get(), _getAnims(), getOptionScopes() (+15 more)

### Community 8 - "draw"
Cohesion: 0.06
Nodes (66): adjustHitBoxes(), ae(), afterDraw(), cd(), _computeLabelArea(), _computeTitleHeight(), cs(), draw() (+58 more)

### Community 9 - "constructor"
Cohesion: 0.09
Nodes (23): Bi(), chartOptionScopes(), constructor(), describe(), Ec(), Fr(), getDevicePixelRatio(), getMeta() (+15 more)

### Community 10 - "_update"
Cohesion: 0.04
Nodes (95): adjustHitBoxes(), afterBuildTicks(), afterCalculateLabelRotation(), afterDataLimits(), afterDraw(), afterFit(), afterSetDimensions(), afterTickToLabelConversion() (+87 more)

### Community 11 - "Illuminate\Database\Eloquent\Model"
Cohesion: 0.05
Nodes (25): AiController, CommentController, Controller, HomeController, LandingController, SitemapController, VerifyIdController, Article (+17 more)

### Community 12 - "x"
Cohesion: 0.15
Nodes (55): at(), B(), he(), br(), Bt(), Cr(), Ct(), dr() (+47 more)

### Community 13 - "Filament\Actions"
Cohesion: 0.05
Nodes (28): CreateArticleCategory, ListArticleCategories, CreateArticle, ListArticles, CreateClient, ListClients, CreateComment, ListComments (+20 more)

### Community 14 - "support.js"
Cohesion: 0.06
Nodes (45): ai(), B(), Ca(), co(), Cr(), es(), Et(), fa() (+37 more)

### Community 15 - "Filament\Forms\Form"
Cohesion: 0.06
Nodes (29): Login, ArticleCategoryResource, App\Filament\Resources\ArticleCategoryResource\Pages, App\Filament\Resources\ArticleResource\Pages, ClientResource, App\Filament\Resources\ClientResource\Pages, App\Filament\Resources\CommentResource\Pages, EmployeeResource (+21 more)

### Community 16 - "o"
Cohesion: 0.06
Nodes (78): So(), _a(), add(), ba(), c(), C(), cl(), Co() (+70 more)

### Community 17 - "deleteInDirection"
Cohesion: 0.07
Nodes (39): ArrowLeft(), ArrowRight(), attachmentManagerDidRequestRemovalOfAttachment(), backspace(), compositionControllerDidRequestRemovalOfAttachment(), d(), delete(), deleteByComposition() (+31 more)

### Community 18 - "quill.js"
Cohesion: 0.08
Nodes (48): BaseTheme(), BaseTooltip(), Block(), BlockEmbed(), Blockquote(), Bold(), Break(), BubbleTheme() (+40 more)

### Community 19 - "getSelectedRange"
Cohesion: 0.06
Nodes (64): breakFormattedBlock(), breaksOnReturn(), compositionControllerDidRequestDeselectingAttachment(), compositionDidStartEditingAttachment(), copyWithoutText(), decreaseBlockAttributeLevel(), decreaseListLevel(), didFocus() (+56 more)

### Community 20 - "ec"
Cohesion: 0.14
Nodes (20): xg(), ac(), Ai(), ca(), ec(), Fc(), G(), getIndexAngle() (+12 more)

### Community 21 - "te"
Cohesion: 0.05
Nodes (12): Aa(), Bi(), bn(), Id(), ji(), kd(), on(), qd() (+4 more)

### Community 22 - "Re"
Cohesion: 0.19
Nodes (50): $c(), X(), ca(), me(), D(), E(), g(), H() (+42 more)

### Community 23 - "Cn"
Cohesion: 0.10
Nodes (69): Qt(), at(), Cn(), b(), Bt(), Ct(), dn(), Dt() (+61 more)

### Community 24 - "buildTicks"
Cohesion: 0.11
Nodes (24): Ao(), buildTicks(), _computeAngle(), _computeLabelSizes(), computeTickLimit(), diff(), _generate(), _getLabelCapacity() (+16 more)

### Community 25 - "updateElements"
Cohesion: 0.07
Nodes (55): acquireContext(), applyStack(), ar(), as(), aspectRatio(), bc(), _calculateBarIndexPixels(), _calculateBarValuePixels() (+47 more)

### Community 26 - ".forEach"
Cohesion: 0.08
Nodes (19): addButton(), addControls(), addSelect(), ColorPicker(), ContainerBlot(), create(), Embed(), expandConfig() (+11 more)

### Community 27 - "setAttribute"
Cohesion: 0.05
Nodes (68): add(), appendAttachmentWithAttributes(), appendBlockForAttributesWithElement(), appendBlockForElement(), appendBlockForTextNode(), appendEmptyBlock(), appendPiece(), appendStringWithAttributes() (+60 more)

### Community 28 - "Illuminate\Database\Migrations\Migration"
Cohesion: 0.06
Nodes (3): Illuminate\Database\Migrations\Migration, Illuminate\Database\Schema\Blueprint, Illuminate\Support\Facades\Schema

### Community 29 - "e"
Cohesion: 0.14
Nodes (18): average(), di(), dn(), getCenterPoint(), hasValue(), In(), jr(), Lt() (+10 more)

### Community 30 - "fromObject"
Cohesion: 0.03
Nodes (125): _a(), after(), afterAutoSkip(), Ag(), Ai(), Al(), as(), before() (+117 more)

### Community 31 - "fn"
Cohesion: 0.10
Nodes (62): Ae(), apply(), Bi(), I(), c(), H(), d(), da() (+54 more)

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
Cohesion: 0.13
Nodes (13): MinifyHtml, SecurityHeaders, CustomPagination, SearchBar, Closure, Illuminate\Contracts\Pagination\LengthAwarePaginator, Illuminate\Contracts\View\View, Illuminate\Foundation\Application (+5 more)

### Community 36 - "Illuminate\Database\Eloquent\Factories\Factory"
Cohesion: 0.07
Nodes (16): ArticleCategoryFactory, ArticleFactory, CommentFactory, JobPostingFactory, JobVacancyDetailFactory, JobVacancyFactory, PortfolioCategoryFactory, PortfolioFactory (+8 more)

### Community 37 - "BaseEditRecord"
Cohesion: 0.07
Nodes (14): EditArticleCategory, EditArticle, EditClient, EditComment, EditEmployee, EditJobVacancy, BaseEditRecord, EditPortfolioCategory (+6 more)

### Community 38 - "render"
Cohesion: 0.06
Nodes (44): beforeinput(), cacheViewForObject(), canSyncDocumentView(), compositionDidLoadSnapshot(), createAttachmentNodes(), createChildView(), createContainerElement(), createDocumentFragmentForSync() (+36 more)

### Community 39 - "t"
Cohesion: 0.19
Nodes (32): _a(), aa(), ba(), Be(), br(), T(), ce(), Dn() (+24 more)

### Community 40 - "getOptionScopes"
Cohesion: 0.10
Nodes (25): al(), beforeUpdate(), _cachedScopes(), cancel(), _createDescriptors(), _descriptors(), fn(), ge() (+17 more)

### Community 41 - "constructor"
Cohesion: 0.07
Nodes (33): alpha(), be(), chartOptionScopes(), constructor(), data(), describe(), en(), fe() (+25 more)

### Community 42 - "package.json"
Cohesion: 0.07
Nodes (30): dependencies, alpinejs, @alpinejs/collapse, flowbite, flowbite-typography, devDependencies, axios, concurrently (+22 more)

### Community 43 - "getDatasetMeta"
Cohesion: 0.06
Nodes (47): addElements(), afterDatasetsUpdate(), buildOrUpdateControllers(), buildOrUpdateElements(), clear(), cn(), _d(), _dataCheck() (+39 more)

### Community 44 - ".length"
Cohesion: 0.13
Nodes (12): bubbleFormats(), contains(), find(), handleBackspace(), handleDelete(), handleDeleteRange(), Iterator(), Keyboard() (+4 more)

### Community 45 - "getMinMax"
Cohesion: 0.11
Nodes (27): afterAutoSkip(), Bi(), buildLookupTable(), determineDataLimits(), endOf(), Fi(), getAllParsedValues(), getDataTimestamps() (+19 more)

### Community 46 - "Illuminate\Database\Seeder"
Cohesion: 0.10
Nodes (13): ArticleCategorySeeder, ArticleSeeder, DatabaseSeeder, JobVacancySeeder, PortfolioCategorySeeder, PortfolioSeeder, ServiceSeeder, StudyCaseSeeder (+5 more)

### Community 47 - "insertString"
Cohesion: 0.04
Nodes (68): attachFiles(), canApplyToDocument(), compositionend(), compositionstart(), compositionupdate(), createLinkHTML(), deleteByDrag(), dragend() (+60 more)

### Community 48 - "ShadowBlot"
Cohesion: 0.08
Nodes (5): BlockBlot(), EmbedBlot(), FormatBlot(), InlineBlot(), ShadowBlot()

### Community 49 - "Lead"
Cohesion: 0.10
Nodes (14): LeadsChart, Lead, User, Filament\Models\Contracts\FilamentUser, Filament\Widgets\ChartWidget, Illuminate\Foundation\Auth\User, Illuminate\Foundation\Testing\RefreshDatabase, Illuminate\Foundation\Testing\TestCase (+6 more)

### Community 50 - "echo.js"
Cohesion: 0.09
Nodes (15): a(), ar(), b(), cr(), H(), ji(), L(), Me() (+7 more)

### Community 51 - "getDatasetMeta"
Cohesion: 0.04
Nodes (68): addControllers(), addElements(), addPlugins(), addScales(), afterDatasetsUpdate(), buildOrUpdateControllers(), buildOrUpdateElements(), buildOrUpdateScales() (+60 more)

### Community 52 - "r"
Cohesion: 0.04
Nodes (128): aspectRatio(), At(), average(), Bs(), Bt(), Ca(), cc(), co() (+120 more)

### Community 53 - "file-upload.js"
Cohesion: 0.08
Nodes (9): constructor(), define(), getExtension(), _getTestState(), getType(), registerListeners(), yt(), jn() (+1 more)

### Community 54 - ".push"
Cohesion: 0.14
Nodes (18): combineFormats(), cursor_normalize_diff(), diff_bisect_(), diff_bisectSplit_(), diff_cleanupMerge(), diff_commonPrefix(), diff_commonSuffix(), diff_compute_() (+10 more)

### Community 55 - "notifyEditorElement"
Cohesion: 0.10
Nodes (23): actionIsExternal(), canInvokeAction(), compositionControllerDidBlur(), compositionControllerDidRender(), compositionControllerDidSyncDocumentView(), compositionDidAddAttachment(), compositionDidChangeAttachmentPreviewURL(), compositionDidChangeCurrentAttributes() (+15 more)

### Community 56 - "preload"
Cohesion: 0.10
Nodes (24): attachmentForFile(), attributesForFile(), compositionShouldAcceptFile(), didChangeAttributes(), getContentType(), getCurrentTextAttributes(), getHeight(), getHref() (+16 more)

### Community 57 - "filament/app.js"
Cohesion: 0.17
Nodes (22): B(), C(), D(), H(), I(), J(), O(), U() (+14 more)

### Community 58 - "format"
Cohesion: 0.04
Nodes (62): Ac(), ar(), Bl(), Ce(), cf(), clone(), Dl(), dtFormatter() (+54 more)

### Community 59 - "serializeSelectionToDataTransfer"
Cohesion: 0.13
Nodes (17): canSetCurrentAttribute(), canSetCurrentBlockAttribute(), canSetCurrentTextAttribute(), cut(), didClickAttachment(), dragstart(), findAttachmentForElement(), getAttachmentAndPositionById() (+9 more)

### Community 60 - "addEventListener"
Cohesion: 0.16
Nodes (16): addEventListener(), bindEvents(), bindResponsiveEvents(), bindUserEvents(), _checkEventBindings(), cs(), el(), gr() (+8 more)

### Community 61 - "getLocationRange"
Cohesion: 0.08
Nodes (37): canAcceptDataTransfer(), canDecreaseNestingLevel(), canIncreaseNestingLevel(), compositionControllerDidFocus(), compositionDidRequestChangingSelectionToLocationRange(), createDOMRangeFromPoint(), createLocationRangeFromDOMRange(), decreaseNestingLevel() (+29 more)

### Community 62 - "DESIGN.md"
Cohesion: 0.05
Nodes (36): Badges & Status, Border Radius Scale, Brand & Accent, Breakpoints, Buttons, Cards & Containers, Collapsing Strategy, Colors (+28 more)

### Community 63 - ".reduce"
Cohesion: 0.13
Nodes (11): applyFormat(), AttributorStore(), _defineProperty(), endsWithNewlineChange(), getLastChangeIndex(), makeEmbedArrowHandler(), matchAlias(), matchAttributor() (+3 more)

### Community 64 - "lt"
Cohesion: 0.24
Nodes (10): ba(), e(), Ip(), It(), lt(), sa(), Wp(), Wt() (+2 more)

### Community 65 - "Se"
Cohesion: 0.20
Nodes (5): Ne(), nt(), Qe(), Se, xe()

### Community 67 - "ne"
Cohesion: 0.07
Nodes (54): ad(), An(), cd(), ee(), cl(), dd(), Do(), el() (+46 more)

### Community 68 - ".remove"
Cohesion: 0.15
Nodes (6): Attributor(), camelize(), ClassAttributor(), extractVideoUrl(), match(), StyleAttributor()

### Community 69 - "color-picker.js"
Cohesion: 0.14
Nodes (3): style(), update(), [x]()

### Community 70 - "kn"
Cohesion: 0.29
Nodes (10): ar(), q(), S(), Ii(), kn(), pe(), Pn(), Qr() (+2 more)

### Community 71 - "AdminPanelProvider.php"
Cohesion: 0.10
Nodes (18): App\Filament\Widgets, AdminPanelProvider, Filament\Http\Middleware\Authenticate, Filament\Http\Middleware\AuthenticateSession, Filament\Http\Middleware\DisableBladeIconComponents, Filament\Http\Middleware\DispatchServingFilamentEvent, Filament\Navigation\MenuItem, Filament\Panel (+10 more)

### Community 72 - "select.js"
Cohesion: 0.12
Nodes (17): [g](), a(), d(), ee(), et(), g(), h(), J() (+9 more)

### Community 73 - "St"
Cohesion: 0.13
Nodes (20): At(), beforeDraw(), dataset(), ea(), Fa(), getMaximumSize(), getSortedVisibleDatasetMetas(), getVisibleDatasetCount() (+12 more)

### Community 74 - "r"
Cohesion: 0.17
Nodes (12): Be(), ei(), ii(), le(), ni(), oi(), r(), ri() (+4 more)

### Community 75 - "t"
Cohesion: 0.20
Nodes (11): di(), e(), g(), Ht(), i(), Ie(), Re(), t() (+3 more)

### Community 76 - "StatsOverview.php"
Cohesion: 0.10
Nodes (8): ArticleResource, CommentResource, PortfolioResource, StudyCaseResource, StatsOverview, Comment, Filament\Widgets\StatsOverviewWidget, Filament\Widgets\StatsOverviewWidget\Stat

### Community 77 - "p"
Cohesion: 0.21
Nodes (6): p(), e, n(), s(), t(), U()

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

### Community 87 - "_p"
Cohesion: 0.22
Nodes (11): c(), o(), _p(), qp(), s(), Sg(), xt(), Ye() (+3 more)

### Community 88 - "_clone"
Cohesion: 0.32
Nodes (8): clone(), _clone(), __getRegExpFlags(), _instanceof(), __isArray(), __isDate(), __isRegExp(), __objToStr()

### Community 89 - "Dashboard"
Cohesion: 0.29
Nodes (3): Dashboard, Filament\Pages\Dashboard, Illuminate\Support\Facades\Auth

### Community 90 - "config"
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 91 - "getMinMax"
Cohesion: 0.25
Nodes (11): aa(), determineDataLimits(), Dh(), _getLabelBounds(), getMinMax(), _getOtherScale(), getUserBounds(), handleTickRangeOptions() (+3 more)

### Community 92 - "AppServiceProvider"
Cohesion: 0.40
Nodes (3): AppServiceProvider, Illuminate\Support\Facades\URL, Illuminate\Support\ServiceProvider

### Community 93 - "promo.blade.php"
Cohesion: 0.33
Nodes (5): landing.sections.promo.hero, landing.sections.promo.pricing, landing.sections.promo.problem, landing.sections.promo.register, landing.sections.promo.solution

### Community 94 - "da"
Cohesion: 0.27
Nodes (10): cf(), da(), fa(), Jc(), Ln(), ma(), qa(), uo() (+2 more)

### Community 95 - "le"
Cohesion: 0.46
Nodes (8): de(), Fe(), Gt(), j(), je(), le(), vt(), Zp()

### Community 96 - "xl"
Cohesion: 0.29
Nodes (7): bi(), jp(), ol(), Tp(), xl(), xp(), yl()

### Community 98 - "rl"
Cohesion: 0.40
Nodes (6): ca(), rl(), Rp(), Sp(), vp(), yp()

### Community 102 - "GenerateSitemap.php"
Cohesion: 0.50
Nodes (3): GenerateSitemap, Illuminate\Console\Command, Spatie\Sitemap\SitemapGenerator

### Community 103 - "psr-4"
Cohesion: 0.40
Nodes (5): autoload, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\

### Community 104 - "logging.php"
Cohesion: 0.40
Nodes (4): Monolog\Handler\NullHandler, Monolog\Handler\StreamHandler, Monolog\Handler\SyslogUdpHandler, Monolog\Processor\PsrLogMessageProcessor

### Community 106 - "addEventListener"
Cohesion: 0.22
Nodes (11): addEventListener(), bindResponsiveEvents(), Du(), isAttached(), Ju(), ku(), Li(), Ma() (+3 more)

### Community 108 - "clickPercent"
Cohesion: 0.60
Nodes (5): clickPercent(), getPosition(), mouseUp(), moveplayhead(), timelineClicked()

### Community 112 - "autoload-dev"
Cohesion: 0.67
Nodes (3): autoload-dev, psr-4, Tests\\

### Community 113 - "extra"
Cohesion: 0.67
Nodes (3): extra, laravel, dont-discover

### Community 115 - "En"
Cohesion: 0.50
Nodes (5): En(), Mt(), On(), vr(), Wr()

### Community 214 - "Product"
Cohesion: 0.22
Nodes (8): Accessibility & Inclusion, Anti-references, Brand Personality, Design Principles, Product, Product Purpose, Register, Users

## Knowledge Gaps
- **112 isolated node(s):** `$schema`, `name`, `type`, `description`, `keywords` (+107 more)
  These have ≤1 connection - possible missing edges or undocumented components. (Counts symbols only; 803 node(s) total have ≤1 connection when file, concept and rationale nodes are included.)
- **11 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Br()` connect `fromObject` to `components/chart.js`, `constructor`, `t`, `x`, `setAttribute`?**
  _High betweenness centrality (0.099) - this node is a cross-community bridge._
- **Why does `constructor()` connect `constructor` to `lt`, `rich-editor.js`, `ne`, `markdown-editor.js`, `insertString`, `getSelectedRange`, `Cn`, `preload`, `setAttribute`, `fromObject`?**
  _High betweenness centrality (0.050) - this node is a cross-community bridge._
- **Why does `resetDialogInputs()` connect `setAttribute` to `rich-editor.js`, `constructor`, `fromObject`?**
  _High betweenness centrality (0.036) - this node is a cross-community bridge._
- **Are the 3 inferred relationships involving `_update()` (e.g. with `g()` and `f()`) actually correct?**
  _`_update()` has 3 INFERRED edges - model-reasoned connections that need verification._
- **Are the 13 inferred relationships involving `x()` (e.g. with `D()` and `g()`) actually correct?**
  _`x()` has 13 INFERRED edges - model-reasoned connections that need verification._
- **Are the 2 inferred relationships involving `_update()` (e.g. with `g()` and `f()`) actually correct?**
  _`_update()` has 2 INFERRED edges - model-reasoned connections that need verification._
- **Are the 19 inferred relationships involving `te()` (e.g. with `je()` and `Pr()`) actually correct?**
  _`te()` has 19 INFERRED edges - model-reasoned connections that need verification._