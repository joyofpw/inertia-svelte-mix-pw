<script context="module">
    import Layout, { title } from '@/Shared/Layout.svelte'
    export const layout = Layout
</script>

<script>
    import {inertia, page} from '@inertiajs/inertia-svelte';

    const { routes, welcome, title:pageTitle} = $page.props;

    $title = "The Future is Now!"

</script>

<h1>{pageTitle}</h1>
<ul>
    <li>{welcome}</li>
    <li>
        <a
            use:inertia
            href={routes.home.uri}
            >Click Here for Home!
        </a>
    </li>
    <li>
        <a
        use:inertia
        href={routes.redirect.uri}
        >Click Here for Redirection Test
        </a>
    </li>
</ul>

