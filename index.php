<?php
/**
 * @file index.php
 * @brief Сайт свадьбы для Алмаза И Эвелины
 *
 * @author Ravil
 * @date 24.11.2025
 *
 * @version 1.0
 */
?>
<form id="guest-form">
    <input name="name" placeholder="Имя" required>
    <input name="surname" placeholder="Фамилия" required>
    <select name="drink">
        <option value="Вино">Вино</option>
        <option value="Пиво">Пиво</option>
        <option value="Свой вариант">Свой вариант</option>
    </select>
    <button type="submit">Отправить</button>
</form>

<script>
    document.getElementById('guest-form').addEventListener('submit', async function(e) {
        e.preventDefault();
        const form = e.target;
        const data = {
            name: form.name.value,
            surname: form.surname.value,
            drink: form.drink.value,
        };

        const resp = await fetch('https://lingering-grass-3d26.bykroim2.workers.dev/', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(data),
        });

        const json = await resp.json();
        if (json.ok) {
            alert('Данные отправлены!');
        } else {
            alert('Ошибка: ' + JSON.stringify(json));
        }
    });
</script>
