# Graph Report - impostmedia  (2026-09-16)

## Corpus Check
- 244 files · ~266,394 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 4307 nodes · 12417 edges · 206 communities (108 shown, 7 thin omitted)
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
- Ae
- constructor
- _update
- get
- draw
- P
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
- getDataset
- te
- select.js
- Cn
- isHorizontal
- updateElements
- .forEach
- setAttribute
- Illuminate\Database\Migrations\Migration
- toString
- fromObject
- I
- appendBlockForElement
- notifications.js
- parse
- Closure
- Illuminate\Database\Eloquent\Factories\Factory
- BaseEditRecord
- render
- support.js
- getOptionScopes
- constructor
- package.json
- getDatasetMeta
- .length
- I
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
- Kg
- getBlock
- e
- getLocationRange
- DESIGN.md
- .reduce
- lt
- initOffsets
- Me
- ye
- .remove
- color-picker.js
- fn
- AdminPanelProvider.php
- _notify
- Wi
- r
- t
- StatsOverview.php
- D
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
- ArticleCategory
- le
- xl
- Be
- rl
- dispatch
- view
- status
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

## Communities (206 total, 7 thin omitted)

### Community 0 - "components/chart.js"
Cohesion: 0.01
Nodes (114): acquireContext(), addControllers(), addPlugins(), addScales(), beforeDatasetDraw(), beforeDatasetsDraw(), bh(), Br() (+106 more)

### Community 1 - "rich-editor.js"
Cohesion: 0.02
Nodes (117): A(), activateAttributeIfSupported(), appendStringToTextAtIndex(), applyBlockAttribute(), attachmentDidChangeUploadProgress(), attachmentIsManaged(), attributeChangedCallback(), Ca() (+109 more)

### Community 2 - "stat/chart.js"
Cohesion: 0.02
Nodes (114): aa(), active(), addControllers(), addPlugins(), addScales(), an(), _animateOptions(), At() (+106 more)

### Community 3 - "markdown-editor.js"
Cohesion: 0.04
Nodes (111): Aa(), Ac(), af(), ai(), al(), An(), ao(), bf() (+103 more)

### Community 4 - "Ae"
Cohesion: 0.05
Nodes (122): be(), _a(), ad(), Ae(), ar(), as(), Ba(), Bc() (+114 more)

### Community 5 - "constructor"
Cohesion: 0.04
Nodes (105): addAttribute(), addAttributeAtRange(), addAttributesAtRange(), addHTMLAttribute(), appendText(), applyBlockAttributeAtRange(), breakFormattedBlock(), canBeGroupedWith() (+97 more)

### Community 6 - "_update"
Cohesion: 0.04
Nodes (85): addBox(), afterBuildTicks(), afterCalculateLabelRotation(), afterDataLimits(), afterFit(), afterSetDimensions(), afterTickToLabelConversion(), afterUpdate() (+77 more)

### Community 7 - "get"
Cohesion: 0.05
Nodes (60): add(), Al(), ar(), _cachedScopes(), cf(), count(), datasetAnimationScopeKeys(), datasetElementScopeKeys() (+52 more)

### Community 8 - "draw"
Cohesion: 0.04
Nodes (106): ad(), adjustHitBoxes(), ae(), af(), afterDraw(), bf(), buildTicks(), calculateLabelRotation() (+98 more)

### Community 9 - "P"
Cohesion: 0.14
Nodes (21): as(), At(), ba(), Bs(), bu(), cc(), Fr(), getPadding() (+13 more)

### Community 10 - "_update"
Cohesion: 0.06
Nodes (60): addElements(), afterBuildTicks(), afterCalculateLabelRotation(), afterDataLimits(), afterDraw(), afterFit(), afterSetDimensions(), afterTickToLabelConversion() (+52 more)

### Community 11 - "Illuminate\Database\Eloquent\Model"
Cohesion: 0.05
Nodes (26): AiController, CommentController, Controller, HomeController, LandingController, SitemapController, VerifyIdController, Article (+18 more)

### Community 12 - "x"
Cohesion: 0.15
Nodes (59): at(), B(), he(), br(), Bt(), ca(), Cr(), Ct() (+51 more)

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
Cohesion: 0.06
Nodes (43): ArrowLeft(), ArrowRight(), attachmentManagerDidRequestRemovalOfAttachment(), backspace(), compositionControllerDidRequestRemovalOfAttachment(), d(), delete(), deleteByComposition() (+35 more)

### Community 18 - "quill.js"
Cohesion: 0.08
Nodes (48): BaseTheme(), BaseTooltip(), Block(), BlockEmbed(), Blockquote(), Bold(), Break(), BubbleTheme() (+40 more)

### Community 19 - "getSelectedRange"
Cohesion: 0.06
Nodes (68): canSetCurrentAttribute(), canSetCurrentTextAttribute(), compositionControllerDidRequestDeselectingAttachment(), compositionDidStartEditingAttachment(), createCaptionElement(), decreaseListLevel(), didClickAttachment(), didFocus() (+60 more)

### Community 20 - "getDataset"
Cohesion: 0.08
Nodes (34): addElements(), buildOrUpdateControllers(), buildOrUpdateElements(), clear(), cn(), _dataCheck(), _destroy(), _destroyDatasetMeta() (+26 more)

### Community 21 - "te"
Cohesion: 0.04
Nodes (13): Bi(), bn(), Id(), ji(), Jr(), kd(), qd(), qi() (+5 more)

### Community 22 - "select.js"
Cohesion: 0.05
Nodes (77): $c(), X(), me(), D(), E(), g(), H(), _i() (+69 more)

### Community 23 - "Cn"
Cohesion: 0.10
Nodes (64): Cn(), b(), Bt(), Ct(), dn(), Dt(), Ft(), G() (+56 more)

### Community 24 - "isHorizontal"
Cohesion: 0.09
Nodes (33): afterAutoSkip(), buildLookupTable(), buildTicks(), computeTickLimit(), diff(), _drawArgs(), Fi(), _generate() (+25 more)

### Community 25 - "updateElements"
Cohesion: 0.04
Nodes (80): xg(), ac(), Ai(), Ao(), applyStack(), ar(), as(), aspectRatio() (+72 more)

### Community 26 - ".forEach"
Cohesion: 0.08
Nodes (19): addButton(), addControls(), addSelect(), ColorPicker(), ContainerBlot(), create(), Embed(), expandConfig() (+11 more)

### Community 27 - "setAttribute"
Cohesion: 0.06
Nodes (55): add(), applyKeyboardCommand(), attachmentDidChangeAttributes(), attachmentEditorDidRequestRemovalOfAttachment(), canBeGrouped(), checkValidity(), copyUsingObjectMap(), copyUsingObjectsFromDocument() (+47 more)

### Community 28 - "Illuminate\Database\Migrations\Migration"
Cohesion: 0.06
Nodes (3): Illuminate\Database\Migrations\Migration, Illuminate\Database\Schema\Blueprint, Illuminate\Support\Facades\Schema

### Community 29 - "toString"
Cohesion: 0.11
Nodes (20): box(), canBeConsolidatedWith(), canRedo(), canUndo(), compositionControllerDidRender(), createEntry(), fromUCS2String(), getTargetDOMRange() (+12 more)

### Community 30 - "fromObject"
Cohesion: 0.03
Nodes (96): abutsStart(), after(), Ag(), Ah(), before(), daysInMonth(), Di(), difference() (+88 more)

### Community 31 - "I"
Cohesion: 0.11
Nodes (52): Ae(), ar(), at(), Bi(), I(), c(), H(), d() (+44 more)

### Community 32 - "appendBlockForElement"
Cohesion: 0.22
Nodes (18): appendAttachmentWithAttributes(), appendBlockForAttributesWithElement(), appendBlockForElement(), appendBlockForTextNode(), appendEmptyBlock(), appendPiece(), appendStringWithAttributes(), findBlockElementAncestors() (+10 more)

### Community 33 - "notifications.js"
Cohesion: 0.08
Nodes (3): duration(), persistent(), seconds()

### Community 34 - "parse"
Cohesion: 0.04
Nodes (79): applyStack(), aspectRatio(), average(), C(), Ca(), _calculateBarIndexPixels(), _calculateBarValuePixels(), cd() (+71 more)

### Community 35 - "Closure"
Cohesion: 0.14
Nodes (12): MinifyHtml, SecurityHeaders, CustomPagination, SearchBar, Closure, Illuminate\Contracts\Pagination\LengthAwarePaginator, Illuminate\Contracts\View\View, Illuminate\Foundation\Application (+4 more)

### Community 36 - "Illuminate\Database\Eloquent\Factories\Factory"
Cohesion: 0.07
Nodes (16): ArticleCategoryFactory, ArticleFactory, CommentFactory, JobPostingFactory, JobVacancyDetailFactory, JobVacancyFactory, PortfolioCategoryFactory, PortfolioFactory (+8 more)

### Community 37 - "BaseEditRecord"
Cohesion: 0.07
Nodes (14): EditArticleCategory, EditArticle, EditClient, EditComment, EditEmployee, EditJobVacancy, BaseEditRecord, EditPortfolioCategory (+6 more)

### Community 38 - "render"
Cohesion: 0.08
Nodes (35): beforeinput(), cacheViewForObject(), canSyncDocumentView(), compositionDidLoadSnapshot(), createAttachmentNodes(), createChildView(), createContainerElement(), createDocumentFragmentForSync() (+27 more)

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
Cohesion: 0.10
Nodes (28): afterDatasetsUpdate(), _d(), generateLabels(), getDatasetMeta(), getDataVisibility(), getMaxBorderWidth(), getStyle(), _handleEvent() (+20 more)

### Community 44 - ".length"
Cohesion: 0.13
Nodes (12): bubbleFormats(), contains(), find(), handleBackspace(), handleDelete(), handleDeleteRange(), Iterator(), Keyboard() (+4 more)

### Community 45 - "I"
Cohesion: 0.07
Nodes (50): add(), Bi(), C(), Co(), _computeLabelSizes(), determineDataLimits(), endOf(), Et() (+42 more)

### Community 46 - "Illuminate\Database\Seeder"
Cohesion: 0.10
Nodes (13): ArticleCategorySeeder, ArticleSeeder, DatabaseSeeder, JobVacancySeeder, PortfolioCategorySeeder, PortfolioSeeder, ServiceSeeder, StudyCaseSeeder (+5 more)

### Community 47 - "insertString"
Cohesion: 0.04
Nodes (70): attachFiles(), canApplyToDocument(), compositionend(), compositionstart(), compositionupdate(), copy(), createElement(), createLinkHTML() (+62 more)

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
Cohesion: 0.10
Nodes (30): afterDatasetsUpdate(), buildOrUpdateControllers(), _destroyDatasetMeta(), generateLabels(), getController(), getDatasetMeta(), getDataVisibility(), _getLegendItemAt() (+22 more)

### Community 52 - "r"
Cohesion: 0.04
Nodes (103): alpha(), an(), Au(), beforeDraw(), Bt(), ch(), create(), cu() (+95 more)

### Community 53 - "file-upload.js"
Cohesion: 0.08
Nodes (9): constructor(), define(), getExtension(), _getTestState(), getType(), registerListeners(), yt(), jn() (+1 more)

### Community 54 - ".push"
Cohesion: 0.14
Nodes (18): combineFormats(), cursor_normalize_diff(), diff_bisect_(), diff_bisectSplit_(), diff_cleanupMerge(), diff_commonPrefix(), diff_commonSuffix(), diff_compute_() (+10 more)

### Community 55 - "notifyEditorElement"
Cohesion: 0.11
Nodes (21): actionIsExternal(), canInvokeAction(), compositionControllerDidBlur(), compositionControllerDidSyncDocumentView(), compositionDidAddAttachment(), compositionDidChangeAttachmentPreviewURL(), compositionDidChangeCurrentAttributes(), compositionDidChangeDocument() (+13 more)

### Community 56 - "preload"
Cohesion: 0.10
Nodes (24): attachmentForFile(), attributesForFile(), compositionShouldAcceptFile(), didChangeAttributes(), getContentType(), getCurrentTextAttributes(), getHeight(), getHref() (+16 more)

### Community 57 - "filament/app.js"
Cohesion: 0.17
Nodes (22): B(), C(), D(), H(), I(), J(), O(), U() (+14 more)

### Community 58 - "Kg"
Cohesion: 0.08
Nodes (34): Ac(), Bl(), clone(), dtFormatter(), el(), eras(), extract(), formatDateTime() (+26 more)

### Community 59 - "getBlock"
Cohesion: 0.16
Nodes (21): breaksOnReturn(), canDecreaseNestingLevel(), canIncreaseNestingLevel(), canSetCurrentBlockAttribute(), decreaseBlockAttributeLevel(), decreaseNestingLevel(), formatIndent(), formatOutdent() (+13 more)

### Community 60 - "e"
Cohesion: 0.09
Nodes (33): addEventListener(), bindEvents(), bindResponsiveEvents(), bindUserEvents(), buildOrUpdateScales(), _checkEventBindings(), cs(), _destroy() (+25 more)

### Community 61 - "getLocationRange"
Cohesion: 0.07
Nodes (32): canAcceptDataTransfer(), compositionControllerDidFocus(), compositionDidRequestChangingSelectionToLocationRange(), createDOMRangeFromLocationRange(), createDOMRangeFromPoint(), createLocationRangeFromDOMRange(), didMouseDown(), domRangeWithinElement() (+24 more)

### Community 62 - "DESIGN.md"
Cohesion: 0.05
Nodes (36): Badges & Status, Border Radius Scale, Brand & Accent, Breakpoints, Buttons, Cards & Containers, Collapsing Strategy, Colors (+28 more)

### Community 63 - ".reduce"
Cohesion: 0.13
Nodes (11): applyFormat(), AttributorStore(), _defineProperty(), endsWithNewlineChange(), getLastChangeIndex(), makeEmbedArrowHandler(), matchAlias(), matchAttributor() (+3 more)

### Community 64 - "lt"
Cohesion: 0.24
Nodes (10): ba(), e(), Ip(), It(), lt(), sa(), Wp(), Wt() (+2 more)

### Community 65 - "initOffsets"
Cohesion: 0.14
Nodes (18): _a(), afterAutoSkip(), Ai(), buildLookupTable(), daysInYear(), getDecimalForPixel(), getDecimalForValue(), getValueForPixel() (+10 more)

### Community 66 - "Me"
Cohesion: 0.15
Nodes (15): apply(), q(), B(), kn(), lt(), Me(), mo(), ms() (+7 more)

### Community 67 - "ye"
Cohesion: 0.20
Nodes (16): cd(), ee(), Et(), Fc(), ii(), ld(), oi(), oo() (+8 more)

### Community 68 - ".remove"
Cohesion: 0.15
Nodes (6): Attributor(), camelize(), ClassAttributor(), extractVideoUrl(), match(), StyleAttributor()

### Community 69 - "color-picker.js"
Cohesion: 0.12
Nodes (5): [g](), style(), update(), [x](), tt()

### Community 70 - "fn"
Cohesion: 0.20
Nodes (19): Qt(), da(), fa(), Fi(), fn(), S(), Ii(), je() (+11 more)

### Community 71 - "AdminPanelProvider.php"
Cohesion: 0.10
Nodes (18): App\Filament\Widgets, AdminPanelProvider, Filament\Http\Middleware\Authenticate, Filament\Http\Middleware\AuthenticateSession, Filament\Http\Middleware\DisableBladeIconComponents, Filament\Http\Middleware\DispatchServingFilamentEvent, Filament\Navigation\MenuItem, Filament\Panel (+10 more)

### Community 72 - "_notify"
Cohesion: 0.20
Nodes (14): active(), _animateOptions(), cancel(), _createAnimations(), _createDescriptors(), _descriptors(), kh(), _notify() (+6 more)

### Community 73 - "Wi"
Cohesion: 0.10
Nodes (26): average(), beforeDraw(), dataset(), ea(), ge(), getCenterPoint(), _getSortedDatasetMetas(), getSortedVisibleDatasetMetas() (+18 more)

### Community 74 - "r"
Cohesion: 0.17
Nodes (12): Be(), ei(), ii(), le(), ni(), oi(), r(), ri() (+4 more)

### Community 75 - "t"
Cohesion: 0.20
Nodes (11): di(), e(), g(), Ht(), i(), Ie(), Re(), t() (+3 more)

### Community 76 - "StatsOverview.php"
Cohesion: 0.11
Nodes (7): CommentResource, JobVacancyResource, PortfolioResource, StudyCaseResource, StatsOverview, Filament\Widgets\StatsOverviewWidget, Filament\Widgets\StatsOverviewWidget\Stat

### Community 77 - "D"
Cohesion: 0.23
Nodes (13): cl(), D(), Eo(), Fo(), He(), hl(), jt(), Ma() (+5 more)

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
Cohesion: 0.29
Nodes (10): aa(), determineDataLimits(), Dh(), getMinMax(), _getOtherScale(), getUserBounds(), handleTickRangeOptions(), lt() (+2 more)

### Community 92 - "AppServiceProvider"
Cohesion: 0.40
Nodes (3): AppServiceProvider, Illuminate\Support\Facades\URL, Illuminate\Support\ServiceProvider

### Community 93 - "promo.blade.php"
Cohesion: 0.33
Nodes (5): landing.sections.promo.hero, landing.sections.promo.pricing, landing.sections.promo.problem, landing.sections.promo.register, landing.sections.promo.solution

### Community 95 - "le"
Cohesion: 0.46
Nodes (8): de(), Fe(), Gt(), j(), je(), le(), vt(), Zp()

### Community 96 - "xl"
Cohesion: 0.29
Nodes (7): bi(), jp(), ol(), Tp(), xl(), xp(), yl()

### Community 98 - "rl"
Cohesion: 0.40
Nodes (6): ca(), rl(), Rp(), Sp(), vp(), yp()

### Community 99 - "dispatch"
Cohesion: 0.25
Nodes (8): dispatch(), dispatchSelf(), dispatchTo(), emit(), emitSelf(), emitTo(), event(), eventData()

### Community 100 - "view"
Cohesion: 0.29
Nodes (7): actions(), button(), constructor(), grouped(), link(), name(), view()

### Community 101 - "status"
Cohesion: 0.40
Nodes (5): danger(), info(), status(), success(), warning()

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
Cohesion: 0.16
Nodes (15): addEventListener(), bindEvents(), bindResponsiveEvents(), bindUserEvents(), _checkEventBindings(), Du(), isAttached(), Ju() (+7 more)

### Community 108 - "clickPercent"
Cohesion: 0.60
Nodes (5): clickPercent(), getPosition(), mouseUp(), moveplayhead(), timelineClicked()

### Community 112 - "autoload-dev"
Cohesion: 0.67
Nodes (3): autoload-dev, psr-4, Tests\\

### Community 113 - "extra"
Cohesion: 0.67
Nodes (3): extra, laravel, dont-discover

### Community 214 - "Product"
Cohesion: 0.22
Nodes (8): Accessibility & Inclusion, Anti-references, Brand Personality, Design Principles, Product, Product Purpose, Register, Users

## Knowledge Gaps
- **112 isolated node(s):** `$schema`, `name`, `type`, `description`, `keywords` (+107 more)
  These have ≤1 connection - possible missing edges or undocumented components. (Counts symbols only; 804 node(s) total have ≤1 connection when file, concept and rationale nodes are included.)
- **7 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Br()` connect `components/chart.js` to `constructor`, `t`, `x`, `setAttribute`, `fromObject`?**
  _High betweenness centrality (0.099) - this node is a cross-community bridge._
- **Why does `constructor()` connect `constructor` to `lt`, `rich-editor.js`, `components/chart.js`, `ye`, `Ae`, `fn`, `insertString`, `getSelectedRange`, `preload`, `setAttribute`, `toString`?**
  _High betweenness centrality (0.050) - this node is a cross-community bridge._
- **Why does `resetDialogInputs()` connect `setAttribute` to `components/chart.js`, `rich-editor.js`, `constructor`?**
  _High betweenness centrality (0.036) - this node is a cross-community bridge._
- **Are the 3 inferred relationships involving `_update()` (e.g. with `g()` and `f()`) actually correct?**
  _`_update()` has 3 INFERRED edges - model-reasoned connections that need verification._
- **Are the 13 inferred relationships involving `x()` (e.g. with `D()` and `g()`) actually correct?**
  _`x()` has 13 INFERRED edges - model-reasoned connections that need verification._
- **Are the 2 inferred relationships involving `_update()` (e.g. with `g()` and `f()`) actually correct?**
  _`_update()` has 2 INFERRED edges - model-reasoned connections that need verification._
- **Are the 19 inferred relationships involving `te()` (e.g. with `je()` and `Pr()`) actually correct?**
  _`te()` has 19 INFERRED edges - model-reasoned connections that need verification._