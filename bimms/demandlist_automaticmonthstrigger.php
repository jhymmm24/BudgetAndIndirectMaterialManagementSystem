<!-- DO $$
DECLARE
    current_year TEXT := '2027';  -- Set to the desired year
    month TEXT;
BEGIN
    FOR month IN SELECT lower(to_char(date_trunc('month', (i || '-01-' || current_year)::date), 'FMMonth'))
                  FROM generate_series(1, 12) AS i
    LOOP
        EXECUTE format('ALTER TABLE tbl_mim_approvaltest ADD COLUMN IF NOT EXISTS %I_%s TEXT', month, current_year);
    END LOOP;
END $$; -->