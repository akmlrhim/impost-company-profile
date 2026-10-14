# Graph Report - impostmedia  (2026-10-14)

## Corpus Check
- 134 files · ~100,386 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 936 nodes · 1489 edges · 112 communities (63 shown, 21 thin omitted)
- Extraction: 100% EXTRACTED · 0% INFERRED · 0% AMBIGUOUS · INFERRED: 4 edges (avg confidence: 0.85)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `b9b56737`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- AGENTS.md
- Cloud CLI
- .forEach
- Detection Checklist
- Process
- Architecture Best Practices
- Security Best Practices
- ContainerBlot
- TextBlot
- Tailwind CSS Development
- Migration Best Practices
- Illuminate\Database\Eloquent\Model
- Queue and Job Best Practices
- Advanced Query Best Practices
- Caching Best Practices
- Database Performance Best Practices
- Eloquent Best Practices
- Events and Notifications Best Practices
- _classCallCheck
- laravel-best-practices/SKILL.md
- Blade and View Best Practices
- Error Handling Best Practices
- Task Scheduling Best Practices
- Endpoint Tests
- Article
- FormatBlot
- .insertBefore
- Collection Best Practices
- Illuminate\Database\Migrations\Migration
- HTTP Client Best Practices
- Mail Best Practices
- Routing and Controller Best Practices
- Convention and Style Best Practices
- Validation and Forms Best Practices
- Assertions
- bootstrap/app.php
- Illuminate\Database\Eloquent\Factories\Factory
- testing-best-practices/SKILL.md
- Fakes, Mocks, and Determinism
- Test Suite Performance
- Reviewing Tests
- Portfolio
- package.json
- laravel-boost
- .length
- .format
- Illuminate\Database\Seeder
- .formats
- ShadowBlot
- ExampleTest
- Toolbar
- Configuration Best Practices
- Naming and Structure
- JobPosting
- Service
- StudyCase
- User
- Selection
- ScrollBlot
- Factories and Test Data
- Testing Best Practices
- camelize
- .opencode/opencode.json
- .copy
- graphify.js
- Controller.php
- Illuminate\Support\Facades\Route
- .canAdd
- require-dev
- composer.json
- require
- scripts
- EventEmitter
- quill.js
- config
- AppServiceProvider
- ArticleCategory
- psr-4
- logging.php
- console.php
- ExampleTest
- LeafBlot
- autoload-dev
- extra

## God Nodes (most connected - your core abstractions)
1. `_classCallCheck()` - 50 edges
2. `_possibleConstructorReturn()` - 44 edges
3. `ContainerBlot()` - 21 edges
4. `ShadowBlot()` - 18 edges
5. `TextBlot()` - 12 edges
6. `LinkedList()` - 12 edges
7. `Cloud CLI` - 12 edges
8. `require-dev` - 11 edges
9. `Detection Checklist` - 11 edges
10. `Architecture Best Practices` - 11 edges

## Surprising Connections (you probably didn't know these)
- `ExampleTest` --inherits--> `TestCase`  [EXTRACTED]
  tests/Feature/ExampleTest.php → tests/TestCase.php

## Import Cycles
- None detected.

## Communities (112 total, 21 thin omitted)

### Community 0 - "AGENTS.md"
Cohesion: 0.06
Nodes (33): APIs & Eloquent Resources, Application Structure & Architecture, Artisan, Conventions, Database, Deployment, Do Things the Laravel Way, Documentation Files (+25 more)

### Community 1 - "Cloud CLI"
Cohesion: 0.06
Nodes (30): Adding a cache to an existing environment, Adding a database to an existing environment, Checklists for Multi-Step Operations, Custom domain setup, Full environment setup (app + database + cache + domain), New app from scratch, Application Setup, Billing and Usage (+22 more)

### Community 2 - ".forEach"
Cohesion: 0.18
Nodes (14): addButton(), addControls(), addSelect(), BaseTheme(), BubbleTheme(), Clipboard(), ColorPicker(), Cursor() (+6 more)

### Community 3 - "Detection Checklist"
Cohesion: 0.17
Nodes (11): A. Validation & HTTP input, B. Controllers & routing, C. Authorization, D. Eloquent & models, Detection Checklist, E. Architecture & organization, F. Frontend & views, G. Database & migrations (+3 more)

### Community 4 - "Process"
Cohesion: 0.17
Nodes (11): Edge cases, Glob mapping, Ground Rules (read before you start), Infer Conventions, Process, Step 0: Orient, Step 1: Predefined sweep, Step 2: Open-ended pass (+3 more)

### Community 5 - "Architecture Best Practices"
Cohesion: 0.17
Nodes (11): Architecture Best Practices, Depend on Contracts at Boundaries, Extract Focused Business Operations, Follow Framework Conventions, Inject Required Dependencies, Specify a Deterministic Sort Order, Use Atomic Locks for Race Conditions, Use `Concurrency::run()` for Parallel Execution (+3 more)

### Community 6 - "Security Best Practices"
Cohesion: 0.17
Nodes (11): Apply Cross-Site Request Forgery Protection, Audit Dependencies, Authorize Protected Actions, Bind Query Parameters, Control Mass Assignment, Encrypt Sensitive Attributes When Appropriate, Escape Output in Its Context, Keep Secrets Out of Application Code (+3 more)

### Community 8 - "TextBlot"
Cohesion: 0.20
Nodes (7): endsWithNewlineChange(), getLastChangeIndex(), handleEnter(), makeCodeBlockHandler(), matchAttributor(), query(), TextBlot()

### Community 9 - "Tailwind CSS Development"
Cohesion: 0.18
Nodes (10): Basic Usage, Common Pitfalls, CSS-First Configuration, Dark Mode, Documentation, Import Syntax, Replaced Utilities, Spacing (+2 more)

### Community 10 - "Migration Best Practices"
Cohesion: 0.20
Nodes (9): Define Foreign-Key Constraints Deliberately, Design Indexes for Real Queries, Generate Migrations with Artisan, Keep Migrations Focused, Make Rollbacks Honest, Migration Best Practices, Mirror Defaults Only When Unsaved Models Need Them, Stage Changes That Affect Existing Rows (+1 more)

### Community 11 - "Illuminate\Database\Eloquent\Model"
Cohesion: 0.21
Nodes (8): Client, Comment, Leads, PortfolioCategory, Team, Testimonial, Illuminate\Database\Eloquent\Factories\HasFactory, Illuminate\Database\Eloquent\Model

### Community 12 - "Queue and Job Best Practices"
Cohesion: 0.20
Nodes (9): Back Off Transient Failures, Batch Jobs for Group Coordination, Configure Time-Based Retry Limits Deliberately, Handle Terminal Failure When Needed, Keep Reservation Time Longer Than Execution Time, Queue and Job Best Practices, Rate Limit External Calls, Use Horizon for Redis Queue Operations (+1 more)

### Community 13 - "Advanced Query Best Practices"
Cohesion: 0.22
Nodes (9): Advanced Query Best Practices, Combine Related Counts with Conditional Aggregates, Compare `whereHas()` with an `IN` Subquery, Consider a Correlated Subquery for Has-Many Ordering, Create Dynamic Relationships with a Subquery Foreign Key, Design Composite Indexes for the Query, Measure Two Simple Queries Against One Complex Query, Reuse Loaded Parent Models with `setRelation()` (+1 more)

### Community 14 - "Caching Best Practices"
Cohesion: 0.22
Nodes (8): Caching Best Practices, Configure Failover Cache Stores in Production, Consider `Cache::flexible()` for Stale-While-Revalidate, Use `Cache::add()` for Atomic Conditional Writes, Use `Cache::memo()` to Avoid Redundant Hits Within an Execution, Use `Cache::remember()` for Cache-Aside Reads, Use Cache Tags to Invalidate Related Groups, Use `once()` for In-Process Memoization

### Community 15 - "Database Performance Best Practices"
Cohesion: 0.22
Nodes (8): Add Indexes for Measured Query Patterns, Count Relationships Without Loading Them, Database Performance Best Practices, Eager Load Relationships Before Iterating, Keep Queries Out of Blade Templates, Prevent Lazy Loading in Development, Process Large Data Sets Incrementally, Select Only Needed Columns

### Community 16 - "Eloquent Best Practices"
Cohesion: 0.22
Nodes (8): Apply Global Scopes Sparingly, Cast Date and Time Attributes, Define Attribute Casts, Define Precise Relationship Types, Eloquent Best Practices, Keep Application Queries Model-Aware, Use Local Scopes for Reusable Queries, Use `whereBelongsTo()` for Relationship Queries

### Community 17 - "Events and Notifications Best Practices"
Cohesion: 0.22
Nodes (9): Cache Event Discovery During Production Deployment, Dispatch Queued Notifications After Commit, Events and Notifications Best Practices, Implement `HasLocalePreference` on Notifiable Models, Queue Slow Notifications, Rely on Event Discovery, Route Notification Channels to Dedicated Queues, Use On-Demand Notifications for Non-User Recipients (+1 more)

### Community 18 - "_classCallCheck"
Cohesion: 0.11
Nodes (33): BaseTooltip(), Block(), BlockEmbed(), Blockquote(), Bold(), Break(), _classCallCheck(), Code() (+25 more)

### Community 19 - "laravel-best-practices/SKILL.md"
Cohesion: 0.25
Nodes (5): Consistency First, Decision Rules, How to Apply, Laravel Best Practices, Rule Index

### Community 20 - "Blade and View Best Practices"
Cohesion: 0.25
Nodes (7): Blade and View Best Practices, Prefer Components for Explicit Interfaces, Return Blade Fragments for Partial Rendering, Share Compatible View Data with a View Composer, Share Parent Component Props with `@aware`, Use `$attributes->merge()` in Component Templates, Use `@pushOnce` for Per-Component Scripts

### Community 21 - "Error Handling Best Practices"
Cohesion: 0.25
Nodes (7): Add Context to Exception Classes, Choose Where to Report and Render Exceptions, Define JSON Rendering for API Routes, Error Handling Best Practices, Mark Exceptions the Handler Should Not Report, Prevent Duplicate Reports of One Exception Instance, Throttle High-Volume Exception Reports

### Community 22 - "Task Scheduling Best Practices"
Cohesion: 0.25
Nodes (7): Bound Work Inside the Task, Group Shared Configuration, Prevent Unwanted Overlap, Restrict Tasks by Environment, Run a Task on One Server, Run Eligible Commands in the Background, Task Scheduling Best Practices

### Community 23 - "Endpoint Tests"
Cohesion: 0.25
Nodes (7): Endpoint Coverage, Endpoint Tests, How to Write the Test, Tenant Isolation, Test Authorization at the Policy Level, Testing Validation, Which Layer Owns Which Case

### Community 27 - "Collection Best Practices"
Cohesion: 0.29
Nodes (6): Choose Between `cursor()` and `lazy()`, Collection Best Practices, Use `#[CollectedBy]` for Custom Collection Classes, Use Higher-Order Messages for Simple Operations, Use `lazyById()` When Updating Records While Iterating, Use `toQuery()` for Bulk Operations on Collections

### Community 28 - "Illuminate\Database\Migrations\Migration"
Cohesion: 0.07
Nodes (3): Illuminate\Database\Migrations\Migration, Illuminate\Database\Schema\Blueprint, Illuminate\Support\Facades\Schema

### Community 29 - "HTTP Client Best Practices"
Cohesion: 0.29
Nodes (6): Fake HTTP Requests in Tests, Handle Errors Explicitly, HTTP Client Best Practices, Pool Independent Requests, Retry Only Safe Operations, Set Explicit Timeouts

### Community 30 - "Mail Best Practices"
Cohesion: 0.29
Nodes (6): Assert the Delivery Mode, Dispatch Queued Mail After Commit, Mail Best Practices, Queue Slow Mail Delivery, Separate Content and Delivery Tests, Use Markdown Mailables When They Fit

### Community 31 - "Routing and Controller Best Practices"
Cohesion: 0.29
Nodes (6): Keep Controllers Focused on HTTP Concerns, Organize Controllers Around Resources, Routing and Controller Best Practices, Scope Nested Bindings, Use Implicit Route Model Binding, Use Resource Routes for Resourceful Actions

### Community 32 - "Convention and Style Best Practices"
Cohesion: 0.29
Nodes (6): Convention and Style Best Practices, Follow Project Naming Conventions, Keep Presentation Code Maintainable, Prefer Clear, Idiomatic Syntax, Use Utilities When They Clarify Intent, Write Comments That Explain Why

### Community 33 - "Validation and Forms Best Practices"
Cohesion: 0.29
Nodes (6): Add Cross-Field Validation After Base Rules, Express Conditional Rules Clearly, Extract Validation When It Improves the Boundary, Prefer Readable Rule Syntax, Use Only Intended Validated Data, Validation and Forms Best Practices

### Community 34 - "Assertions"
Cohesion: 0.29
Nodes (6): Arrange, Act, Assert, Assert a Known Value, Assert the Complete Result, Assertions, How to Find the Correct Assertion, Named Response Assertions

### Community 35 - "bootstrap/app.php"
Cohesion: 0.33
Nodes (4): Illuminate\Foundation\Application, Illuminate\Foundation\Configuration\Exceptions, Illuminate\Foundation\Configuration\Middleware, Illuminate\Http\Request

### Community 36 - "Illuminate\Database\Eloquent\Factories\Factory"
Cohesion: 0.08
Nodes (14): ArticleCategoryFactory, CommentFactory, JobPostingFactory, PortfolioCategoryFactory, PortfolioFactory, ServiceFactory, StudyCaseFactory, TeamFactory (+6 more)

### Community 37 - "testing-best-practices/SKILL.md"
Cohesion: 0.29
Nodes (3): Built-in Laravel Assertion Methods, How to Find Test Framework Features, Security Tests

### Community 38 - "Fakes, Mocks, and Determinism"
Cohesion: 0.29
Nodes (7): Database, Fakes, Mocks, and Determinism, Framework Fakes, How to Isolate a Dependency, Mocking, Outbound HTTP Testing, Time and Randomness

### Community 39 - "Test Suite Performance"
Cohesion: 0.29
Nodes (6): Common Errors, Global Fakes, How to Find a Slow Test, How to Run the Suite in Parallel, Test Environment, Test Suite Performance

### Community 40 - "Reviewing Tests"
Cohesion: 0.29
Nodes (6): Assertions, Coverage, Data and Determinism, Names and Structure, Reviewing Tests, Test Value

### Community 42 - "package.json"
Cohesion: 0.07
Nodes (30): dependencies, alpinejs, aos, flowbite, flowbite-typography, devDependencies, axios, concurrently (+22 more)

### Community 43 - "laravel-boost"
Cohesion: 0.29
Nodes (6): command, enabled, type, mcp, laravel-boost, $schema

### Community 44 - ".length"
Cohesion: 0.06
Nodes (38): applyFormat(), combineFormats(), computeStyle(), contains(), cursor_normalize_diff(), deltaEndsWith(), diff_bisect_(), diff_bisectSplit_() (+30 more)

### Community 46 - "Illuminate\Database\Seeder"
Cohesion: 0.27
Nodes (7): DatabaseSeeder, PortfolioCategorySeeder, TeamSeeder, TestimonialSeeder, Illuminate\Database\Console\Seeds\WithoutModelEvents, Illuminate\Database\Seeder, PHPUnit\Metadata\Test

### Community 47 - ".formats"
Cohesion: 0.38
Nodes (6): bubbleFormats(), handleBackspace(), handleDelete(), handleDeleteRange(), Keyboard(), List()

### Community 49 - "ExampleTest"
Cohesion: 0.33
Nodes (3): Illuminate\Foundation\Testing\TestCase, ExampleTest, TestCase

### Community 50 - "Toolbar"
Cohesion: 0.29
Nodes (5): BubbleTooltip(), Emitter(), History(), Syntax(), Toolbar()

### Community 51 - "Configuration Best Practices"
Cohesion: 0.33
Nodes (5): Configuration Best Practices, Name Repeated Domain Values, Protect Production Secrets, Read Environment Variables in Configuration Files, Use `App::environment()` for Environment Checks

### Community 52 - "Naming and Structure"
Cohesion: 0.33
Nodes (5): File Layout, Grouping, Naming and Structure, Naming Tests, Test Function

### Community 56 - "User"
Cohesion: 0.40
Nodes (3): User, Illuminate\Foundation\Auth\User, Illuminate\Notifications\Notifiable

### Community 57 - "Selection"
Cohesion: 0.33
Nodes (5): create(), EE(), ParchmentError(), register(), Selection()

### Community 59 - "Factories and Test Data"
Cohesion: 0.40
Nodes (4): Datasets, Each Test Makes Its Own Data, Factories and Test Data, Record Construction

### Community 60 - "Testing Best Practices"
Cohesion: 0.40
Nodes (5): Consistency First, How to Apply, Rule Index, Testing Best Practices, What to Test

### Community 68 - ".canAdd"
Cohesion: 0.25
Nodes (4): Attributor(), ClassAttributor(), extractVideoUrl(), match()

### Community 79 - "require-dev"
Cohesion: 0.18
Nodes (11): require-dev, fakerphp/faker, fruitcake/laravel-debugbar, laravel-lang/lang, laravel/pail, laravel/pint, laravel/sail, mockery/mockery (+3 more)

### Community 82 - "composer.json"
Cohesion: 0.22
Nodes (8): description, keywords, license, minimum-stability, name, prefer-stable, $schema, type

### Community 83 - "require"
Cohesion: 0.29
Nodes (7): require, intervention/image, intervention/image-laravel, laravel/framework, laravel/tinker, mews/purifier, php

### Community 84 - "scripts"
Cohesion: 0.22
Nodes (9): scripts, dev, post-autoload-dump, post-create-project-cmd, post-root-package-install, post-update-cmd, pre-package-uninstall, setup (+1 more)

### Community 88 - "quill.js"
Cohesion: 0.11
Nodes (13): clone(), _clone(), _defineProperty(), __getRegExpFlags(), _instanceof(), __isArray(), isBuffer(), __isDate() (+5 more)

### Community 90 - "config"
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 92 - "AppServiceProvider"
Cohesion: 0.40
Nodes (3): AppServiceProvider, Illuminate\Support\Facades\URL, Illuminate\Support\ServiceProvider

### Community 94 - "ArticleCategory"
Cohesion: 0.28
Nodes (3): ArticleCategory, ArticleFactory, ArticleCategorySeeder

### Community 103 - "psr-4"
Cohesion: 0.40
Nodes (5): autoload, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\

### Community 104 - "logging.php"
Cohesion: 0.40
Nodes (4): Monolog\Handler\NullHandler, Monolog\Handler\StreamHandler, Monolog\Handler\SyslogUdpHandler, Monolog\Processor\PsrLogMessageProcessor

### Community 112 - "autoload-dev"
Cohesion: 0.67
Nodes (3): autoload-dev, psr-4, Tests\\

### Community 113 - "extra"
Cohesion: 0.67
Nodes (3): extra, laravel, dont-discover

## Knowledge Gaps
- **315 isolated node(s):** `$schema`, `plugin`, `Controller`, `$schema`, `name` (+310 more)
  These have ≤1 connection - possible missing edges or undocumented components. (Counts symbols only; 453 node(s) total have ≤1 connection when file, concept and rationale nodes are included.)
- **21 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `ShadowBlot()` connect `ShadowBlot` to `quill.js`, `FormatBlot`, `.insertBefore`, `.length`?**
  _High betweenness centrality (0.008) - this node is a cross-community bridge._
- **Why does `ContainerBlot()` connect `ContainerBlot` to `.forEach`, `TextBlot`, `.length`, `.format`, `ShadowBlot`, `quill.js`, `.insertBefore`, `.copy`?**
  _High betweenness centrality (0.008) - this node is a cross-community bridge._
- **What connects `$schema`, `plugin`, `Controller` to the rest of the system?**
  _315 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `AGENTS.md` be split into smaller, more focused modules?**
  _Cohesion score 0.058823529411764705 - nodes in this community are weakly interconnected._
- **Should `Cloud CLI` be split into smaller, more focused modules?**
  _Cohesion score 0.0625 - nodes in this community are weakly interconnected._
- **Should `_classCallCheck` be split into smaller, more focused modules?**
  _Cohesion score 0.10984848484848485 - nodes in this community are weakly interconnected._
- **Should `Illuminate\Database\Migrations\Migration` be split into smaller, more focused modules?**
  _Cohesion score 0.06648936170212766 - nodes in this community are weakly interconnected._