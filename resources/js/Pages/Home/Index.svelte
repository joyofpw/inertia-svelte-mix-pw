<script context="module">
    import Layout, { title } from '@/Shared/Layout.svelte'
    export const layout = Layout
</script>

<script>
    import {inertia, page} from '@inertiajs/inertia-svelte';
    
    const { routes, hello, title:header } = $page.props;

    $title = "My Index"

    console.log($page);

</script>

<h1>{header}</h1>
<ul>
    <li>Around the {hello}</li>
</ul>
<a
use:inertia
href={routes.hello.uri}
>Click Here for Hello!</a>