<script context="module">
    import Layout, { title } from '@/Shared/Layout.svelte'
    export const layout = Layout
</script>

<script>
    import {Inertia} from '@inertiajs/inertia';
    import {inertia, page} from '@inertiajs/inertia-svelte';

    const { routes, welcome, title:pageTitle} = $page.props;

    // see https://inertiajs.com/validation
    export let errors = {}

    $title = "The Future is Now!"

    const values = {
        name: ''
    };

    let succeded = false;

    const handleSubmit = () => {
        Inertia.post(routes.validation.uri, values, {
            onSuccess: (response) => {
                console.log({data:response.data});
                succeded = true;
            }
        })
    };

    console.log($page);

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
    <li>
        <a
        use:inertia
        href={routes.validation.uri}
        >Click Here for Redirection Test (Using $inertia->location)
        </a>
    </li>
</ul>

{#if succeded }
    <h2>You guessed!</h2>
{:else}
<form on:submit|preventDefault={handleSubmit}>
    <h2>What is the name of Mr. Cramer?</h2>
    {#if errors && errors.name}<div>{errors.name}</div>{/if}
    <input type="text" name="name" bind:value={values.name}>
    <button type="submit">Send!</button>
</form>
{/if}
