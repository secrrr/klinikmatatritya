<div
    style="background: #ffffff; width: 100%; max-width: 260px;
            border-radius: 20px; padding: 55px 20px 25px 20px; 
            position: relative; text-align:center;
            border: 3px solid #c5daf8;
            box-shadow: 0 8px 18px rgba(0,0,0,0.18);">

    <!-- Foto -->
    <div style="position: absolute; top: -45px; left: 50%; transform: translateX(-50%);">
        <img src="{{ $photo ?? 'https://via.placeholder.com/95' }}"
            style="width:95px; height:95px; border-radius:50%; object-fit:cover; 
                    border:5px solid white;">
    </div>

    <div style="margin-top: 10px;">
        <a href="{{ route('fe.doctors.detail', $id) }}" style="font-weight:700; color:#00329b; font-size:17px;">
            {{ $name }}
        </a>
        @if ($spec)
            <div style="color:#666; font-size:14px; margin-bottom:12px;">
                {{ $spec }}
            </div>
        @endif
    </div>

    <!-- Jadwal -->
    <table style="width:100%; font-size:14px; color:#222;">
        @foreach ($schedule as $day => $hours)
            <tr>
                <td style="text-align:left; font-weight:600; padding:3px 0; width:40%;">
                    {{ $day }}
                </td>
                <td style="text-align:right; padding:3px 0;">
                    <span style="margin-right:4px; opacity:.8;">🕒</span> {{ $hours }}
                </td>
            </tr>
        @endforeach
    </table>
</div>
